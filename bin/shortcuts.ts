import { promises as fs } from 'fs';

class GenerateShortcuts {
  constructor(private readonly feed: string, private readonly outputPath: string) {
    this.clearOutputPath();
  }

  async execute(): Promise<void> {
    (await this.fetchText(this.feed)).split('\n').forEach((row: string) => {
      const shortcut = Shortcut.fromCsvRow(row);
      console.log('Generating static files for', shortcut);

      shortcut.names.forEach(async name => {
        if (name === 'code' && shortcut.url === 'location') return; // First line
        await fs.appendFile(this.outputPath, `/${name} ${shortcut.url} 301\n`);
      });
    });
  }

  private async fetchText(feed: string): Promise<string> {
    const response = await fetch(feed);

    if (!response.ok) {
      throw new Error(`Failed to fetch ${feed}: ${response.statusText}`);
    }

    return await response.text();
  }

  private async clearOutputPath() {
    try {
      await fs.unlink(this.outputPath);
    } catch (error: any) {
      if (error.code !== 'ENOENT') {
        throw error;
      }
    }
  }
}

class Shortcut {
  private constructor(readonly names: string[], readonly url: string) {}

  static fromCsvRow(row: string): Shortcut {
    let names: string[];
    let url: string;

    if (row.startsWith('"')) {
      // Many shortcuts => One URL
      // Example: "gh, github",https://github.com/afonsodemori,
      const [namesPart, urlPart] = row.split('",');
      names = namesPart
        .substring(1)
        .split(',')
        .map(name => name.trim());
      url = urlPart.trim().slice(0, -1);
    } else {
      // One shortcut => One URL
      // Example: alura,https://cursos.alura.com.br/user/afonsodemori,
      const [name, urlPart] = row.split(',');
      names = [name.trim()];
      url = urlPart.trim();
    }

    return new Shortcut(names, url);
  }
}

new GenerateShortcuts(
  'https://docs.google.com/spreadsheets/d/e/2PACX-1vRny4h8y8u_z3FDv3JaLt7PZuB0zy1VzX4ep7E9gD-tihrZGpeNT6AUS33B8FM5xpN22WRz5qeQaQUs/pub?gid=2039462908&single=true&output=csv',
  './public/_redirects',
)
  .execute()
  .then(r => {})
  .catch(error => {
    console.error('Error executing GenerateShortcuts:', error);
  });
