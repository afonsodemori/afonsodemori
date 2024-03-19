import GenerateShortcuts from "./GenerateShortcuts";

new GenerateShortcuts().execute().then(r => {
}).catch(error => {
    console.error('Error executing GenerateShortcuts:', error);
});
