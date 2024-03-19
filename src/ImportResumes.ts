import * as fs from "fs";
import axios from "axios";

// TODO: Check this whole flow and refactor
export default class ImportResumes {
    baseUrl = 'https://docs.google.com/document/export?id={file_id}&format={format}';
    fileOutputPath = 'dist/docs/cv-{language}-afonso_de_mori.{format}';
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
                const response = await axios.get(endpoint);
                const outputPath = this
                    .fileOutputPath
                    .replace('{language}', urlInfo.lang)
                    .replace('{format}', format)
                ;
                console.log(`=> ${outputPath}`);
                fs.writeFile(outputPath, response.data, err => {
                    if (err) {
                        console.error('Failed to write to file:', err);
                    }
                });
            }
        }
    }
}
