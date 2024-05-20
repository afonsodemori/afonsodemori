import * as fs from 'fs';
import * as path from 'path';

interface Page {
    name: string;
    url: string;
}

class GeneratePages {
    execute() {
        const languages = ['en', 'es', 'pt'];

        const pages: Page[] = [
            { name: 'home', url: '/' },
            { name: 'contact', url: '/contact' },
            { name: 'curriculum', url: '/cv' },
        ];

        const hash = Math.round(Math.random() * 1000000).toString();

        pages.forEach(page => {
            console.log('Generating Page', page);
            languages.forEach(language => {
                console.log(`Language: ${language}`);
                try {
                    // load translation
                    const translation = JSON.parse(fs.readFileSync(path.join(__dirname, `../translations/${page.name}.${language}.json`), 'utf-8'));

                    // load page
                    const html = fs.readFileSync(path.join(__dirname, `../templates/${page.name}.html`), 'utf-8');

                    let outputHtml = html.replace(/{{([a-z_0-9.]+)}}/g, (match, key) => {
                        const value = translation[key];
                        if (key === 'hash') return hash;
                        if (value === undefined) throw new Error(`Missing translation: ${page.name} / ${language} / ${key}`);
                        return value;
                    });

                    const outputPath = path.join(__dirname, `../dist/${page.url.substring(1)}/${language}.html`).replace('//', '/');
                    console.log(outputPath);

                    // Create directories as needed
                    const outputDir = path.dirname(outputPath);
                    fs.mkdirSync(outputDir, { recursive: true });

                    fs.writeFileSync(outputPath, outputHtml);
                } catch (error) {
                    console.error(error);
                }
            });
        });
    }
}

new GeneratePages().execute();
