package dev.afonso;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Shortcut { // record available from Java 14
    private final String[] shortcuts;
    private final String longUrl;

    public Shortcut(String[] shortcuts, String longUrl) {
        this.shortcuts = shortcuts;
        this.longUrl = longUrl;
    }

    public static Shortcut fromCsvLine(String line) {
        String[] shortcuts;
        String longUrl;

        if (line.charAt(0) == '"') {
            // Many shortcuts => One URL
            // Example: "gh, github",https://github.com/afonsodemori,
            Matcher matcher = Pattern.compile("\"(.*)\"").matcher(line);
            matcher.find();
            shortcuts = matcher.group(1).split(", ?");
            longUrl = line.substring(line.indexOf("\",") + 2, line.length() - 1);
        } else {
            // One shortcut => One URL
            // Example: alura,https://cursos.alura.com.br/user/afonsodemori,
            shortcuts = new String[]{line.substring(0, line.indexOf(","))};
            longUrl = line.substring(line.indexOf(",") + 1, line.length() - 1);
        }

        return new Shortcut(shortcuts, longUrl);
    }

    public String[] shortcuts() {
        return shortcuts;
    }

    public String longUrl() {
        return longUrl;
    }
}
