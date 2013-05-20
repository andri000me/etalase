<html>
    <head>
        <title><?php echo $judul; ?></title>
    </head>
    <body>                        
    <h1>Insert Data User</h1>
    <form action="simpan_user" method="post">
        <table> 
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap"/></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"/></td>
            </tr>
            </tr>
                <td>Email</td>
                <td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" style="height: 80px;"></textarea></td>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"/></td>
            </tr>
        </table>
    </form>
    </body>
</html>