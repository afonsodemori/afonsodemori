import fs from 'fs';

class ImportResumes {
  private readonly baseUrl = 'https://docs.google.com/document/export?id={file_id}&format={format}';
  private readonly fileOutputPath = './public/docs/cv-{language}-afonso_de_mori.{format}';
  private readonly sourceUrls = [
    { lang: 'en', fileId: '1aYKfrRKX0YHVZukZvMGe3cXTOIY648ZXwF3iXTGQF34' },
    { lang: 'es', fileId: '1TT9BpFpy6QBs1sygecTuPAHD8iPMPII1y3Rw7rNuj74' },
    { lang: 'pt', fileId: '1hWho1MfmHPZIXEARbHaZJydXULzVoTqSnMi0Z64dOq8' },
  ];
  private readonly formats = ['pdf', 'docx', 'txt', 'odt', 'md'];

  async execute(): Promise<void> {
    for (const urlInfo of this.sourceUrls) {
      console.group(`Language: ${urlInfo.lang}`);

      for (const format of this.formats) {
        const endpoint = this.baseUrl
          .replace('{file_id}', urlInfo.fileId)
          .replace('{format}', format);
        console.log(`Getting ${endpoint}…`);

        const response = await fetch(endpoint);
        if (!response.ok) {
          throw new Error(`Failed to fetch ${endpoint}: ${response.statusText}`);
        }
        const data = await response.arrayBuffer();

        const outputPath = this.fileOutputPath
          .replace('{language}', urlInfo.lang)
          .replace('{format}', format);
        console.info(`Generated: ${outputPath}`);
        fs.writeFileSync(outputPath, Buffer.from(data), 'binary');
        this.fix(format, urlInfo.lang, outputPath);
        console.log();
      }
      console.groupEnd();
      console.log();
    }
  }

  private fix(format: string, lang: string, path: string): void {
    if (!['txt', 'md'].includes(format)) return;

    console.info(`Fixing ${format}…`);

    if (format === 'txt') {
      const content = fs.readFileSync(path, 'utf-8');
      const output = content
        .replace('\r\n Email:', '\r\nEmail:')
        .replace('\r\n Correo:', '\r\nCorreo:')
        .replace('\r\n E-mail:', '\r\nE-mail:')
        .replace(' \r\n me', ' me')

        .replace('Phone and WhatsApp:  ', '\r\nPhone and WhatsApp: ')
        .replace('Teléfono y WhatsApp:  ', '\r\nTeléfono y WhatsApp: ')
        .replace('Telefone e WhatsApp:  ', '\r\nTelefone e WhatsApp: ')

        .replace('LinkedIn:  afonso.dev', '\r\nLinkedIn: https://afonso.dev')
        .replace('GitHub:  afonso.dev', '\r\nGitHub: https://afonso.dev')

        .split('\n')
        .map(line => line.trim())
        .join('\n');
      fs.writeFileSync(path, output);
      return;
    }

    if (format === 'md') {
      // get date from txt file
      const date = fs
        .readFileSync(path.replace('.md', '.txt'), 'utf-8')
        .split('\n')
        .pop()
        ?.replace(/(https:\/\/.*)/, '[$1]($1)');

      // format original .md file, and add date to it
      const content = fs
        .readFileSync(path, 'utf-8')
        .replace(/\\([+-])/g, '$1') // remove unnecesary escape for - and +
        .replace('[image1]:', `_${date}_\n\n[image1]:`) // add date
        .split('\n')
        .map(line => line.trim())
        .join('\n')
        .concat('\n');
      fs.writeFileSync(path.replace('.md', '.original.md'), content);

      // format downloadable .md
      const output = content
        .replace(/!\[([^\]]+)]\[\w+]/g, '\n* $1') // replace icons by text
        .split('\n')
        .map(line => line.trim())
        .filter(line => !line.match(/^\[image\d+]: /)) // remove image references
        .join('\n')
        .replace(/\n{2,}/g, '\n\n') // remove extra line breaks
        .trim()
        .concat('\n');
      fs.writeFileSync(path, output);
      return;
    }
  }
}

new ImportResumes()
  .execute()
  .then(() => {})
  .catch(error => {
    console.error('Error executing ImportResumes:', error);
  });
