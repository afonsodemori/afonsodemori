package dev.afonso;

import java.io.IOException;

public class Build {

    public static void main(String[] args) throws IOException {
        PageGenerator.run();
        ResumesImporter.run();
        // ShortcutsGenerator.run(); TODO: Moved to TS
    }
}
