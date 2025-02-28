import type { PagesFunction } from '@cloudflare/workers-types';

export const onRequestPost: PagesFunction = async ({ request, env }) => {
  try {
    const { name, email, subject, message, token } = await request.json();

    if (!token) {
      return new Response(JSON.stringify({ success: false, error: 'Missing reCAPTCHA token' }), {
        status: 400,
      });
    }

    // Verify reCAPTCHA with Google
    const verifyRes = await fetch('https://www.google.com/recaptcha/api/siteverify', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({
        secret: env.RECAPTCHA_SECRET,
        response: token,
      }),
    });

    const verifyData = await verifyRes.json();
    if (!verifyData.success) {
      return new Response(JSON.stringify({ success: false, error: 'Invalid reCAPTCHA' }), {
        status: 403,
      });
    }

    // Send Email using Resend
    const emailRes = await fetch('https://api.resend.com/emails', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Authorization: `Bearer ${env.RESEND_API_KEY}`,
      },
      body: JSON.stringify({
        from: `${name} - via afonso.dev <${env.CONTACT_FROM}>`,
        to: env.CONTACT_TO,
        reply_to: email,
        subject,
        text: message,
      }),
    });

    const emailData = await emailRes.json();
    if (!emailRes.ok) {
      return new Response(JSON.stringify({ success: false, error: 'contact.form.failure' }), {
        status: 500,
      });
    }

    return new Response(JSON.stringify({ success: true, message: 'contact.form.success' }), {
      status: 200,
    });
  } catch (error) {
    return new Response(JSON.stringify({ success: false, error: 'contact.form.unexpected' }), {
      status: 500,
    });
  }
};
