import GenerateShortcuts from "./GenerateShortcuts";
import ImportResumes from "./ImportResumes";

new GenerateShortcuts().execute().then(r => {
}).catch(error => {
    console.error('Error executing GenerateShortcuts:', error);
});

new ImportResumes().execute().then(r => {
}).catch(error => {
    console.error('Error executing ImportResumes:', error);
});
