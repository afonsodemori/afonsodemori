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
                // load text
                const text = fs.readFileSync(path.join(__dirname, `../dist/docs/cv-${language}-afonso_de_mori.txt`), 'utf-8');
                let formattedText : string[] = [];
                // for each line, replace the text
                text.split('\n').forEach(line => {
                    line = line.trim();

                    if (line === 'Afonso de Mori Ayres da Silva') {
                        formattedText.push(`<h1>${line}</h1>`);
                    } else if ([
                        'Profile', 'Perfil',
                        'Experience', 'Experiencia', 'Experiência',
                        'Education', 'Educación', 'Educação',
                        'Languages', 'Idiomas',
                        'Skills', 'Aptitudes', 'Habilidades',
                    ].includes(line)) {
                        formattedText.push(`<h2>${line}</h2>`);
                    } else if (line.startsWith('*')) {
                        formattedText.push(`<li>${line.substring(2)}</li>`);
                    } else {
                        formattedText.push(`<p>${line}</p>`);
                    }
                });

                const finalText = formattedText
                    .join('')
                    // split contact info
                    .replace(/ {5}/g, '</p><p>')
                    .replace(/:<\/p><p>me@/g, ': me@')
                    // replace links
                    .replace('me@afonso.dev', '<a href="mailto:me@afonso.dev">me@afonso.dev</a>')
                    .replace('+34 602 443 854', '<a href="tel://+34602443854">+34 602 443 854</a>')
                    .replace('afonso.dev/linkedin', '<a target="_blank" href="https://afonso.dev/linkedin">afonso.dev/linkedin</a>')
                    .replace('afonso.dev/github', '<a target="_blank" href="https://afonso.dev/github">afonso.dev/github</a>')
                    .replace(`https://afonso.dev/cv/${language}`, `<a target="_blank" href="https://afonso.dev/cv/${language}">https://afonso.dev/cv/${language}</a>`)
                    // opens lists
                    .replace(/<\/h2><li>/g, '</h2><ul><li>')
                    .replace(/<\/p><li>/g, '</p><ul><li>')
                    // closes lists
                    .replace(/<\/li><p>/g, '</li></ul><p>')
                    .replace(/<\/li><h/g, '</li></ul><h')
                    // remove duplicated paragraphs
                    .replace(/<p><\/p><p><\/p>/g, '<p></p>')
                    // sanitize empty paragraphs
                    .replace(/<p><\/p>/g, '<p>&nbsp;</p>')
                ;

                console.log(finalText);

                const fileToChange = path.join(__dirname, `../dist/cv/${language}.html`);
                const html = fs.readFileSync(fileToChange, 'utf-8');
                let outputHtml = html.replace('[[[replace-cv-text]]]', finalText);
                fs.writeFileSync(fileToChange, outputHtml);
            } catch (error) {
                console.error(error);
            }
        });
    }
}

new ReplaceCvText().execute();
