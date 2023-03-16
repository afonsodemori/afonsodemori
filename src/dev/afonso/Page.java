package dev.afonso;

public class Page {

    private final String name;
    private final String url;

    public Page(String name, String url) {
        this.name = name;
        this.url = url;
    }

    public String name() {
        return name;
    }

    public String url() {
        return url;
    }
}
