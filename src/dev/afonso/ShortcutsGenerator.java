package dev.afonso;

import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.nio.file.Files;
import java.nio.file.StandardOpenOption;
import java.util.ArrayList;
import java.util.List;

class ShortcutsGenerator {

    public static final String FEED_URL = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRny4h8y8u_z3FDv3JaLt7PZuB0zy1VzX4ep7E9gD-tihrZGpeNT6AUS33B8FM5xpN22WRz5qeQaQUs/pub?gid=2039462908&single=true&output=csv";

    public static void main(String[] args) throws IOException {
        System.out.println("==> Generating shortcuts\n");
        String csv = new HttpClient().get(new URL(FEED_URL));
        List<Shortcut> shortcuts = mapShortcuts(csv);

        File file = new File("dist/_redirects");
        // Clear or create file
        Files.write(file.toPath(), "".getBytes());

        shortcuts.forEach(shortcut -> {
            String line;
            for (String shortcutString : shortcut.shortcuts()) {
                try {
                    line = "/" + shortcutString.trim() + " " + shortcut.longUrl() + " 301\n";
                    System.out.print(line);
                    Files.write(file.toPath(), line.getBytes(), StandardOpenOption.APPEND);
                } catch (IOException e) {
                    throw new RuntimeException(e);
                }
            }
        });
    }

    private static List<Shortcut> mapShortcuts(String csv) {
        List<Shortcut> shortcuts = new ArrayList<>();

        String[] lines = csv.split("\n");
        for (String line : lines) {
            if (line.equals("code,location,web version") || line.isEmpty()) {
                continue;
            }

            shortcuts.add(Shortcut.fromCsvLine(line));
        }

        return shortcuts;
    }
}
