package dev.afonso;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.List;
import java.util.Properties;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * TODO: This file is a mess... Just wanted it to work. Refactor everything!
 */
class PageGenerator {

    public static void run() {
        String hash = Math.round(Math.random() * 1000000) + "";

        List<String> languages = new ArrayList<>();
        languages.add("en");
        languages.add("es");
        languages.add("pt");

        List<Page> pages = new ArrayList<>();
        pages.add(new Page("home", "/"));
        pages.add(new Page("contact", "/contact"));

        Properties translation = new Properties();
        pages.forEach(page -> languages.forEach(language -> {
            String key = null;
            try {
                // load translation
                translation.loadFromXML(Files.newInputStream(Paths.get(String.format("translations/%s.%s.xml", page.name(), language))));

                // load page
                File html = new File(String.format("templates/%s.html", page.name()));

                List<String> strings = Files.readAllLines(html.toPath());

                StringBuilder fullHtml = new StringBuilder();
                strings.forEach(string -> {
                    fullHtml.append(string).append("\n");
                });

                String outputHtml = fullHtml.toString();
                outputHtml = outputHtml.replaceAll("\\{hash}", hash);

                Matcher matcher = Pattern.compile("\\{([a-z0-9.]++)}").matcher(outputHtml);

                while (matcher.find()) {
                    key = matcher.group(1);
                    String value = translation.get(key).toString();
                    outputHtml = outputHtml.replace(matcher.group(), value);
                }

                File output = new File(String.format("dist/%s/%s.html", page.url().substring(1), language).replace("//", "/"));
                Files.write(output.toPath(), outputHtml.getBytes());
            } catch (IOException e) {
                throw new RuntimeException(e);
            } catch (NullPointerException e) {
                System.out.println("Missing translation: " + key);
                throw new RuntimeException(e.getMessage());
            }
        }));
    }
}
