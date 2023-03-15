package dev.afonso;

import java.io.File;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.nio.file.Files;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

class ResumesImporter {

    private static final String SOURCE_URL = "https://docs.google.com/document/export?id={file_id}&format={format}";
    private static final String FILE_OUTPUT_PATH = "dist/docs/cv-{language}-afonso_de_mori.{format}";
    private static final HashMap<String, String> FILES_IDS = new HashMap<>();
    private static final List<String> FILES_FORMATS = new ArrayList<>();

    static {
        FILES_IDS.put("en", "1aYKfrRKX0YHVZukZvMGe3cXTOIY648ZXwF3iXTGQF34");
        FILES_IDS.put("es", "1TT9BpFpy6QBs1sygecTuPAHD8iPMPII1y3Rw7rNuj74");
        FILES_IDS.put("pt", "1hWho1MfmHPZIXEARbHaZJydXULzVoTqSnMi0Z64dOq8");

        FILES_FORMATS.add("pdf");
        FILES_FORMATS.add("docx");
        FILES_FORMATS.add("txt");
        FILES_FORMATS.add("odt");
    }

    public static void main(String[] args) {
        System.out.println("==> Importing resumes...\n");
        FILES_IDS.forEach((language, fileId) -> FILES_FORMATS.forEach(format -> {
            try {
                String filePath = generateFilePath(language, format);
                File file = new File(filePath);
                URL sourceUrl = generateSourceUrl(fileId, format);
                new HttpClient().download(sourceUrl, file);
                System.out.printf("-> %s ... %d KB%n%n", file.toPath(), Files.size(file.toPath()) / 1024);
            } catch (IOException e) {
                throw new RuntimeException(e);
            }
        }));
    }

    private static URL generateSourceUrl(String fileId, String format) throws MalformedURLException {
        return new URL(SOURCE_URL
                .replace("{file_id}", fileId)
                .replace("{format}", format)
        );
    }

    private static String generateFilePath(String language, String format) {
        return FILE_OUTPUT_PATH
                .replace("{language}", language)
                .replace("{format}", format);
    }
}
