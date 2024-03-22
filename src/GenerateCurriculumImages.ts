import {fromPath} from "pdf2pic";

// TODO: Refactor
export default class GenerateCurriculumImages {
    execute() {
        ['en', 'es', 'pt'].forEach(language => {
            const options = {
                density: 100,
                saveFilename: `cv-${language}-afonso_de_mori`,
                savePath: [__dirname, "/../dist/docs"].join(''),
                format: "jpeg",
                width: 1200,
                preserveAspectRatio: true,
            };

            const filePath = [__dirname, `/../dist/docs/cv-${language}-afonso_de_mori.pdf`].join('');
            console.log(filePath);
            const convert = fromPath(filePath, options);
            convert.setGMClass(true);
            const pageToConvertAsImage = [1, 2];

            pageToConvertAsImage.forEach(pageNumber => {
                convert(pageNumber, {responseType: "image"})
                    .then((resolve) => {
                        console.log(`Page ${pageNumber} is now converted as image`);

                        return resolve;
                    });
            })
        });
    }
}
