import Shortcut from "./Model/Shortcut";
import * as fs from "fs";
import axios from "axios";

// TODO: Check this whole flow and refactor
export default class GenerateShortcuts {
    feed = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRny4h8y8u_z3FDv3JaLt7PZuB0zy1VzX4ep7E9gD-tihrZGpeNT6AUS33B8FM5xpN22WRz5qeQaQUs/pub?gid=2039462908&single=true&output=csv';
    outputPath = 'dist/_redirects';

    async execute() {
        fs.truncate(this.outputPath, 0, err => {
            if (err) {
                console.error('Failed to truncate file:', err);
            }
        })

        let text;
        try {
            const response = await axios.get(this.feed);
            text = response.data;
        } catch (e) {
        }

        const rows = text.split('\n');
        rows.forEach((row: any) => {
            const shortcut = Shortcut.fromCsvRow(row);
            console.log('Generating static files for', shortcut);
            shortcut.names.forEach(name => {
                if (name === 'code' && shortcut.url === 'locatio') {
                    // first line = header. TODO: improve this
                    return;
                }

                const outputLine = "/" + name + " " + shortcut.url + " 301\n";
                try {
                    fs.appendFile(this.outputPath, outputLine, err => {
                        if (err) {
                            console.error('Failed to append to file:', err);
                        }
                    });
                } catch (e) {
                    console.log(e);
                }
            });
        });
    }
}
