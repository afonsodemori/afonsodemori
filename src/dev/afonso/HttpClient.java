package dev.afonso;

import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;

public class HttpClient {

    public String get(URL url) throws IOException {
        System.out.println("=> GET " + url.toString());
        HttpURLConnection connection = (HttpURLConnection) url.openConnection();
        int responseCode = connection.getResponseCode();

        if (responseCode != HttpURLConnection.HTTP_OK) {
            throw new RuntimeException("<= Request has failed.");
        }

        BufferedReader reader = new BufferedReader(new InputStreamReader(connection.getInputStream()));
        String line;
        StringBuilder response = new StringBuilder();

        while ((line = reader.readLine()) != null) {
            response.append(String.format("%s\n", line));
        }

        reader.close();

        return response.toString();
    }

    public void download(URL url, File file) throws IOException {
        System.out.println("=> Downloading " + url.toString());
        HttpURLConnection connection = (HttpURLConnection) url.openConnection();
        int responseCode = connection.getResponseCode();

        if (responseCode != HttpURLConnection.HTTP_OK) {
            throw new RuntimeException("<= Request has failed.");
        }

        InputStream inputStream = connection.getInputStream();
        FileOutputStream outputStream = new FileOutputStream(file);

        int bytesRead;
        byte[] buffer = new byte[1024];
        while ((bytesRead = inputStream.read(buffer)) != -1) {
            outputStream.write(buffer, 0, bytesRead);
        }

        outputStream.close();
        inputStream.close();
        connection.disconnect();
    }
}
