import * as fs from 'fs';
import * as path from 'path';

interface Page {
    name: string;
    url: string;
}

class ReplaceCvText {
    execute() {
        const languages = ['en', 'es', 'pt'];

        languages.forEach(language => {
            console.log(`Language: ${language}`);
            try {
                const markdownText = fs.readFileSync(path.join(__dirname, `../dist/docs/cv-${language}-afonso_de_mori.md`), 'utf-8');
                const htmlContent = this.markdownToHtml(markdownText);
                console.log(htmlContent);

                const fileToChange = path.join(__dirname, `../dist/cv/${language}.html`);
                const html = fs.readFileSync(fileToChange, 'utf-8');
                let outputHtml = html.replace('[[[replace-cv-text]]]', htmlContent);
                fs.writeFileSync(fileToChange, outputHtml);
            } catch (error) {
                console.error(error);
            }
        });
    }

    // TODO:: Refactor / improve
    private markdownToHtml(markdown: string): string {
        let html = markdown;

        const imageReferences: { [key: string]: string } = this.extractImageReferences(markdown);

        // headers
        html = html.replace(/^# (.*)$/gm, '<h1>$1</h1>');  // For <h1>
        html = html.replace(/^## (.*)$/gm, '<h2>$1</h2>'); // For <h2>
        html = html.replace(/^### (.*)$/gm, '<h3>$1</h3>'); // For <h3>

        // bold and italic
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');

        // links
        html = html.replace(/\[([^\]]+)]\(([^)]+)\)/g, '<a href="$2">$1</a>');

        // lists
        // html = html.replace(/^\* (.+)$/gm, '<ul><li>$1</li></ul>');
        html = html.replace(/^\* (.+)$/gm, '<li>$1</li>');
        let liIsOpen = false;
        html = html.split('\n').map(value => {
            if (!liIsOpen && value.trim().startsWith('<li>')) {
                liIsOpen = true;
                return `<ul>${value}`;
            } else if (liIsOpen && value.trim() !== '' && !value.trim().startsWith('<li>')) {
                liIsOpen = false;
                return `</ul>${value}`;
            } else {
                return value;
            }
        }).join('\n');
        // html = html.replace(/^\d+ (.+)$/gm, '<ol><li>$1</li></ol>');

        // images
        html = html.replace(/!\[([^\]]+)]\[([^\]]+)]/g, (match, altText, imageId) => {
            const base64Image = imageReferences[imageId];
            return base64Image ? `<br><span class="icon" style="background-image: url(${base64Image})" title="${altText}"></span>` : match;
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
