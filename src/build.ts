import GenerateShortcuts from "./GenerateShortcuts";
import ImportResumes from "./ImportResumes";
import GeneratePages from "./GeneratePages";
import GenerateCurriculumImages from "./GenerateCurriculumImages";

new GeneratePages().execute();

new GenerateShortcuts().execute().then(r => {
}).catch(error => {
    console.error('Error executing GenerateShortcuts:', error);
});

new ImportResumes().execute().then(r => {
    new GenerateCurriculumImages().execute();
}).catch(error => {
    console.error('Error executing ImportResumes:', error);
});
