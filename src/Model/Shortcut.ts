export default class Shortcut {
    private constructor(readonly names: string[], readonly url: string) {
    }

    public static fromCsvRow(row: string): Shortcut {
        let names: string[];
        let url: string;

        if (row.startsWith('"')) {
            // Many shortcuts => One URL
            // Example: "gh, github",https://github.com/afonsodemori,
            const parts = row.substring(1, row.indexOf('",'));
            names = parts.split(',').map(name => name.trim());
            url = row.substring(row.indexOf('",') + 2).trim().slice(0, -1);
        } else {
            // One shortcut => One URL
            // Example: alura,https://cursos.alura.com.br/user/afonsodemori,
            const parts = row.split(',');
            names = [parts[0].trim()];
            url = parts[1].trim().slice(0, -1);
        }

        return new Shortcut(names, url);
    }
}
