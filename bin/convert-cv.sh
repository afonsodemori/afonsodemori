#!/bin/bash

pdf_dir="dist/docs"

for pdf_file in "$pdf_dir"/cv-*.pdf; do
    filename=$(basename -- "$pdf_file")
    filename_no_ext="${filename%.*}"

    pdftoppm "$pdf_file" "$pdf_dir/$filename_no_ext" -png
    pdftoppm -r 10 "$pdf_file" "$pdf_dir/$filename_no_ext-low" -png

    for png_file in "$pdf_dir"/cv-*.png; do
        webp_file="$pdf_dir/$(basename -- "$png_file" .png).webp"
        cwebp -q 80 "$png_file" -o "$webp_file"
    done

    echo "Conversion completed for $pdf_file"
done
