import * as fs from "fs";
import axios from "axios";
import path from "path";

// TODO: Check this whole flow and refactor
class ImportResumes {
    baseUrl = 'https://docs.google.com/document/export?id={file_id}&format={format}';
    fileOutputPath = path.join(__dirname, '../dist/docs/cv-{language}-afonso_de_mori.{format}');
    sourceUrls = [
        {'lang': 'en', 'fileId': '1aYKfrRKX0YHVZukZvMGe3cXTOIY648ZXwF3iXTGQF34'},
        {'lang': 'es', 'fileId': '1TT9BpFpy6QBs1sygecTuPAHD8iPMPII1y3Rw7rNuj74'},
        {'lang': 'pt', 'fileId': '1hWho1MfmHPZIXEARbHaZJydXULzVoTqSnMi0Z64dOq8'},
    ];
    formats = ['pdf', 'docx', 'txt', 'odt'];

    async execute() {
        for (const urlInfo of this.sourceUrls) {
            for (const format of this.formats) {
                const endpoint = this.baseUrl
                    .replace('{file_id}', urlInfo.fileId)
                    .replace('{format}', format)
                ;
                console.log(`Getting ${endpoint}...`);

                const response = await axios.get(endpoint, {
                    responseType: 'arraybuffer'
                });

                const outputPath = this
                    .fileOutputPath
                    .replace('{language}', urlInfo.lang)
                    .replace('{format}', format)
                ;
                console.log(`=> ${outputPath}`);
                fs.writeFileSync(outputPath, response.data, 'binary');
            }
        }
    }
}

new ImportResumes().execute().then(r => {
}).catch(error => {
    console.error('Error executing ImportResumes:', error);
});
