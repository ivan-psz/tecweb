<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd"/>

    <xsl:template match="/">
    
    <html lang="en">
        <head>
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Servicio VOD</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        </head>
        <body>
            <header class="d-flex justify-content-center align-items-center bg-dark p-3">
                <img src="vod-logo.png" alt="VOD Logo" style="height: 70px;" />
            </header>
            <div class="container my-5">
                <section class="mb-4">
                    <h2 class="text-center">Catálogo</h2>
                    <div class="text-center">
                        <strong>Correo: </strong>
                        <xsl:value-of select="//cuenta/@correo"/>
                        <br/>
                        <strong>Perfil: </strong>
                        <p style="margin: 0; padding: 0;">Nombre: <xsl:value-of select="//perfil/@usuario"/></p>
                        <p style="margin: 0; padding: 0;">Idioma: <xsl:value-of select="//perfil/@idioma"/></p>
                    </div>
                </section>
                <section class="mb-5">
                    <h3>Películas</h3>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th>Duración</th>
                                <th>Género</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="/CatalogoVOD/contenido/peliculas/genero">
                                <xsl:variable name="genre" select="@nombre"/>
                                <xsl:for-each select="titulo">
                                    <tr>
                                        <td><xsl:value-of select="."/></td>
                                        <td><xsl:value-of select="@duracion"/></td>
                                        <td><xsl:value-of select="$genre"/></td>
                                    </tr>
                                </xsl:for-each>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </section>
                <section>
                    <h3>Series</h3>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th>Duración</th>
                                <th>Género</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="/CatalogoVOD/contenido/series/genero">
                                <xsl:variable name="genre" select="@nombre"/>
                                <xsl:for-each select="titulo">
                                    <tr>
                                        <td><xsl:value-of select="."/></td>
                                        <td><xsl:value-of select="@duracion"/></td>
                                        <td><xsl:value-of select="$genre"/></td>
                                    </tr>
                                </xsl:for-each>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </section>
            </div>
        </body>
    </html>

    </xsl:template>
</xsl:stylesheet>