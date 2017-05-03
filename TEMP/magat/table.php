<html>
    <head>
        <meta name="generator"
        content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Table with Ajax Call Back</h2>
                    <table class="table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Heading 1</th>
                                <th>Heading 2</th>
                                <th>Heading 3</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Data 1</td>
                                <td>Data 1</td>
                                <td>Data 1</td>
                                <td class="text-center">
                                    <button class="btn btn-danger" onclick="myFunction(1)">Action</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <div id="applendData"></div>-->
                    <table class="table table-bordered table-condensed table-striped" id="applendData">
                        <caption>Dynamic Table with json.</caption>
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Street</th>
                                <th>City</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
