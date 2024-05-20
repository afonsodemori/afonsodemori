import express from 'express';
import fs from 'fs';
import path from 'path';

const app = express();
const BASE_DIR = path.join(__dirname, '../dist');

app.use('/assets', express.static(BASE_DIR + '/assets', {
    setHeaders: (res, path) => {
        res.set('Cache-Control', 'public, max-age=2592000'); // 30 days in seconds
    }
}));

app.use(express.static(BASE_DIR));

app.get('*', (req, res) => {
    const route = req.path;
    const tryPaths = [
        path.join(BASE_DIR, route),
        path.join(BASE_DIR, `${route}.html`),
        path.join(BASE_DIR, route, 'index.html'),
    ];

    for (const tryPath of tryPaths) {
        if (fs.existsSync(tryPath)) {
            res.sendFile(tryPath);
            return;
        }
    }

    res.status(404).send('Not Found');
});

const port = 3000;
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
    console.log(`http://localhost:${port}`);
});
