// // GET requests to /filename would return "Hello, world!"
// export const onRequestGet = () => {
//     return new Response("Hello, world!")
// }

// POST requests to /filename with a JSON-encoded body would return "Hello, <name>!"
export const onRequestPost = async ({request}) => {
    const {name, email, subject, message} = await request.json();
    const stringToUtf8B64 = string => `=?utf-8?B?${btoa(string)}?=`;

    return fetch(new Request('https://api.mailchannels.net/tx/v1/send', {
        method: 'POST',
        headers: {
            'content-type': 'application/json',
        },
        body: JSON.stringify({
            personalizations: [
                {
                    to: [{email: 'me@afonso.dev', name: 'Afonso de Mori'}],
                },
            ],
            from: {
                email: 'no-reply@afonso.dev',
                name: stringToUtf8B64(`${name} (via afonso.dev)`),
            },
            reply_to: {
                email: `${email}`,
                name: stringToUtf8B64(name),
            },
            subject: stringToUtf8B64(subject),
            content: [
                {
                    type: 'text/plain',
                    value: `${message}`,
                },
            ],
        }),
    })).then(response => {
        return response;
    });
}