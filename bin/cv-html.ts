import fs from 'fs';

interface Page {
  name: string;
  url: string;
}

class ReplaceCvText {
  execute(): void {
    const languages = ['en', 'es', 'pt'];

    languages.forEach(language => {
      console.log(`Language: ${language}`);
      const markdownText = fs.readFileSync(
        `./public/docs/cv-${language}-afonso_de_mori.original.md`,
        'utf-8',
      );
      const htmlContent = this.markdownToHtml(markdownText).replace(
        /<em>(.*?) — <a href="https:\/\/afonso\.dev\/cv.*">.*?<\/a><\/em>/,
        '<em>$1</em>',
      );
      console.log(htmlContent);

      const generatedHtmlPath = `./i18n/cv.generated.${language}.ts`;
      const tsContent = `export default {\n  html: \`\n${htmlContent}\n\`,\n};\n`;
      fs.writeFileSync(generatedHtmlPath, tsContent);
    });
  }

  // TODO: Refactor / improve
  private markdownToHtml(markdown: string): string {
    let html = markdown;

    const imageReferences: { [key: string]: string } = this.extractImageReferences(markdown);

    // headers
    html = html
      .replace(/^# (.*)$/gm, '<h1>$1</h1>') // <h1>
      .replace(/^## (.*)$/gm, '<h2>$1</h2>') // <h2>
      .replace(/^### (.*)$/gm, '<h3>$1</h3>') // <h3>
      .replace(/^#### (.*)$/gm, '<h4>$1</h4>'); // <h4>

    // bold and italic
    html = html
      .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
      .replace(/\_(.*?)\_/g, '<em>$1</em>');

    // links
    html = html.replace(/\[([^\]]+)]\(([^)]+)\)/g, '<a href="$2">$1</a>');

    // lists
    // html = html.replace(/^\* (.+)$/gm, '<ul><li>$1</li></ul>');
    html = html.replace(/^\* (.+)$/gm, '<li>$1</li>');
    let liIsOpen = false;
    html = html
      .split('\n')
      .map(value => {
        if (!liIsOpen && value.trim().startsWith('<li>')) {
          liIsOpen = true;
          return `<ul>${value}`;
        } else if (liIsOpen && value.trim() !== '' && !value.trim().startsWith('<li>')) {
          liIsOpen = false;
          return `</ul>${value}`;
        } else {
          return value;
        }
      })
      .join('\n');
    // html = html.replace(/^\d+ (.+)$/gm, '<ol><li>$1</li></ol>');

    // images
    html = html.replace(/!\[([^\]]+)]\[([^\]]+)]/g, (match, altText, imageId) => {
      const base64Image = imageReferences[imageId];
      return base64Image
        ? `<div class="contact-separator"></div><span class="icon" style="background-image: url(${base64Image})" title="${altText}"></span>`
        : match;
    });

    // clean up
    html = html.replace(/\[([^\]]+)]:\s*<data:image[^>]+>/g, '');
    html = html.replace(/\\-/g, '-').replace(/\\\+/g, '+');

    // line breaks and extra line breaks TODO: review this
    // html = html.replace(/\n/g, '<br />\n');
    html = html.replace(/^\s*[\r\n]/gm, '');

    return html;
  }

  private extractImageReferences(markdown: string): { [key: string]: string } {
    const imageRefs: { [key: string]: string } = {};
    const base64Regex = /\[([^\]]+)]:\s*<data:image[^>]+>/g;

    let match;
    while ((match = base64Regex.exec(markdown)) !== null) {
      const imageId = match[1];
      imageRefs[imageId] = match[0].replace(/\[([^\]]+)]:\s*</, '').replace(/>$/, '');
    }

    return imageRefs;
  }
}

new ReplaceCvText().execute();
