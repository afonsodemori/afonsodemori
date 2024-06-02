# afonso.dev

This little project is actually an experiment using GitHub Actions and Cloudflare Pages to have my personal website always online using their building and serverless infrastructure solutions.

It started in PHP, then Java, and it's currently implemented in TypeScript.

I'm also trying to make good use of Docker, CI with GitHub Actions, and other integrations.

# Building and hosting

This project is built using [GitHub Actions](https://github.com/afonsodemori/afonsodemori/actions) and deployed to [Cloudflare Pages](https://pages.cloudflare.com/).

The deployment process consists of:

- Pulling the content of this repository;
- Running the build process of a Node.js project (`npm ci`, etc.);
- Generating static pages from the templates plus translations;
- Retrieving a CSV from Google Sheets to generate shortcuts like /in (https://afonso.dev/in, etc.);
- Importing my multi-language CV from Google Drive in various formats (PDF, docx, txt);
- Generating low and high-quality images from the PDF files to be used at https://afonso.dev/cv;
- Upload the generated assets to Cloudflare Pages using [Direct Upload](https://developers.cloudflare.com/pages/get-started/direct-upload/).

Deployed branches are:

- [![Build and Deploy](https://github.com/afonsodemori/afonsodemori/actions/workflows/build-and-deploy.yml/badge.svg?branch=main)](https://github.com/afonsodemori/afonsodemori/actions/workflows/build-and-deploy.yml) `main`: Deployed to production (https://afonso.dev);
- [![Build and Deploy](https://github.com/afonsodemori/afonsodemori/actions/workflows/build-and-deploy.yml/badge.svg?branch=develop)](https://github.com/afonsodemori/afonsodemori/actions/workflows/build-and-deploy.yml) `develop`: Deployed to a Cloudflare testing endpoint (https://develop.afonso.pages.dev);
- [![Build and Deploy](https://github.com/afonsodemori/afonsodemori/actions/workflows/build-and-deploy.yml/badge.svg?branch=oven)](https://github.com/afonsodemori/afonsodemori/actions/workflows/build-and-deploy.yml) `oven`: Any branch pushed to `oven` is deployed to a staging-like endpoint (https://oven.afonso.pages.dev).

Please refer to the [build-and-deploy.yml](.github/workflows/build-and-deploy.yml) file and the [Makefile](Makefile) for details on the build.

---

_— [afonso.dev](https://afonso.dev)_
