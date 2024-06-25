<x-layout>
    <link rel="stylesheet" href="/CSS/admin.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>

    <title>الادارة</title>
    <style>
        #myDIV {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: #877268;
            margin-top: 20px;
            display: none;
        }

        #mydiv2 {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: #877268;
            margin-top: 20px;
            display: none;
        }

        #mydiv3 {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: #877268;
            margin-top: 20px;
            display: none;
        }

        #mydiv4 {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: #877268;
            margin-top: 20px;
            display: none;
        }

        #mydiv5 {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: #877268;
            margin-top: 20px;
            display: none;
        }

        #mydiv6 {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: #877268;
            margin-top: 20px;
            display: none;
        }
    </style>

    <style>
        .ui-autocomplete {
            max-height: 200px; /* Adjust the height as needed */
            overflow-y: auto; /* Enable vertical scrolling */
            overflow-x: hidden; /* Hide horizontal overflow */
            z-index: 1000; /* Ensure it appears above other elements */
            background-color: #fff; /* Background color for the autocomplete list */
            border: 1px solid #ccc; /* Border for the autocomplete list */
            width: 100%; /* Adjust the width to match the input field */
        }

        .ui-menu-item-wrapper {
            white-space: nowrap; /* Prevent text wrapping */
            overflow: hidden; /* Hide overflow text */
            text-overflow: ellipsis; /* Show ellipsis for overflow text */
        }

        .ui-helper-hidden-accessible {
            display: none;
        }

        input.ui-autocomplete-input {
            width: 100%; /* Ensure the input field takes full width */
            box-sizing: border-box; /* Ensure padding is included in the width calculation */
        }
    </style>

    <header>
        <x-nav/>
    </header>
    <div class="container">
        <div class="modifysec">
            <div class="lable">
                <h1 class="firsth">مرحبا بك فى اقرأ</h1>
                <h1 class="sech">من فضلك اختر نوع التعديل الذى تريد</h1>
            </div>
            <div class="line"></div>
            <!--buttons-->
            <div class="options">
                <div class="part2">
                    <button class="b4" id="bb4" onclick="myFunction()">
                        إضافة كتاب
                    </button>
                    <button class="b5" id="bb5" onclick="myFunction3()">
                        حذف كتاب
                    </button>
                </div>
                <div class="part1">
                    <button class="b1" id="bb1" onclick="myFunction1()">
                        إضافة قسم
                    </button>
                    <button class="b2" id="bb2" onclick="myFunction4()">حذف قسم
                    </button>
                </div>
                <div class="part3">
                    <button class="b6" id="bb6" onclick="myFunction2()">
                        إضافة مؤلف
                    </button>
                    <button class="b7" id="bb7" onclick="myFunction5()">
                        حذف مؤلف
                    </button>
                </div>
                <!--book add or delete-->
                <div id="myDIV" class="addbook">
                    <form id="addbookForm">
                        @csrf
                        <div class="klk">
                            <div class="data1">
                                <label>حدد اسم الكتاب </label>
                                <input type="text" name="title" id="bookName"/>
                            </div>
                            <div class="data2">
                                <label for="category-select">حدد القسم</label>
                                <select name="category_id" id="category">

                                </select>
                            </div>
                            <div class="data3">
                                <label for="author-select">حدد الكاتب</label>
                                <select name="author_id" id="author">

                                </select>
                            </div>
                            <div class="data4">
                                <label for="">حدد صورة الغلاف </label>
                                <input type="file" name="bookCover" id="bookCover"/>
                            </div>
                            {{--                            <div class="data5">--}}
                            {{--                                <label for="">حدد السعر </label>--}}
                            {{--                                <input type="text" name="price" id="bookPrice" placeholder="اختيارى"/>--}}
                            {{--                            </div>--}}
                            <div class="data6">
                                <label>ارفق ملف الكتاب</label>
                                <input type="file" name="book" id="bookFile"/>
                            </div>
                            <div class="data7">
                                <label for="">وصف الكتاب</label>
                                <textarea name="description" id="bookDescription" cols="120" rows="3"></textarea>
                            </div>
                            <button type="submit">التأكيد</button>
                        </div>
                    </form>
                </div>
                <!--delete book-->
                <div class="delbook" id="mydiv4">
                    <form id="delbookForm">
                        @csrf
                        <div class="data1">
                            <label>حدد اسم الكتاب </label>
                            <input type="text" name="title" id="delBookName"/>
                            <input type="hidden" name="id" id="bookId"/>
                        </div>
                        <button type="submit">التأكيد</button>
                    </form>
                </div>
                <!--category add or delete-->
                <div class="addcat" id="mydiv2">
                    <form id="addcatForm">
                        @csrf
                        <div>
                            <label>حدد اسم القسم</label>
                            <input type="text" name="name" id="categoryName"/>
                        </div>
                        <div>
                            <label>ارفق صورة القسم</label>
                            <input type="file" name="category_photo" id="categoryImage"/>
                        </div>
                        <button type="submit">التأكيد</button>
                    </form>
                </div>
                <!--Category del-->
                <div class="addcat" id="mydiv5">
                    <form id="delcatForm">
                        @csrf
                        <div>
                            <label>حدد اسم القسم</label>
                            <input type="text" name="name" id="delCategoryName"/>
                            <input type="hidden" name="id" id="categoryId"/>
                        </div>
                        <button type="submit">التأكيد</button>
                    </form>
                </div>
                <!--author del-->
                <div class="addaut" id="mydiv6">
                    <form id="delauthorForm">
                        @csrf
                        <div>
                            <label>حدد اسم المؤلف</label>
                            <input type="text" name="name" id="delAuthorName"/>
                            <input type="hidden" name="id" id="authorId"/>
                        </div>
                        <button type="submit">التأكيد</button>
                    </form>
                </div>
                <!--author add-->
                <div class="addaut" id="mydiv3">
                    <form id="addauthorForm">
                        @csrf
                        <div>
                            <label>حدد اسم المؤلف</label>
                            <input type="text" name="name" id="authorName"/>
                        </div>
                        <div>
                            <label>صورة المؤلف</label>
                            <input type="file" name="author_photo" id="authorImage"/>
                        </div>
                        <div>
                            <label for="">وصف الكاتب</label>
                            <textarea name="description" id="authorDescription" cols="120" rows="3"></textarea>
                        </div>
                        <button type="submit">التأكيد</button>
                    </form>
                </div>
                <!--author del-->
            </div>
        </div>
    </div>
    <x-footer/>
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction1() {
            var x = document.getElementById("mydiv2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction2() {
            var x = document.getElementById("mydiv3");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction3() {
            var x = document.getElementById("mydiv4");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction4() {
            var x = document.getElementById("mydiv5");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myFunction5() {
            var x = document.getElementById("mydiv6");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('addcatForm').onsubmit = function (event) {
                event.preventDefault();
                const formData = new FormData(this);

                fetch('/categories', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        alert('Operation successful');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Operation failed');
                    });
            };

            // Add similar event listeners for other forms
            document.getElementById('addbookForm').onsubmit = function (event) {
                event.preventDefault();
                const formData = new FormData(this);

                formData.forEach((value, key) => {
                    console.log(key, value);
                });


                fetch('/books', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(errorData => {
                                throw new Error(errorData.message || 'Network response was not ok');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        alert('Operation successful');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Operation failed ' + error.message);
                    });
            };

            document.getElementById('delbookForm').onsubmit = function (event) {
                event.preventDefault();
                const formData = new FormData(this);
                const bookId = document.querySelector('#bookId').value;
                fetch(`/books/${bookId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        alert('Operation successful');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Operation failed');
                    });
            };

            document.getElementById('delcatForm').onsubmit = function (event) {
                event.preventDefault();
                const categoryId = document.querySelector('#categoryId').value;
                const formData = new FormData(this);

                fetch(`/categories/${categoryId}`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        alert('Category deleted successfully');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Operation failed');
                    });
            };

            document.getElementById('delauthorForm').onsubmit = function (event) {
                event.preventDefault();
                const authorId = document.querySelector('#authorId').value;
                const formData = new FormData(this);
                fetch(`/authors/${authorId}`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        alert('Author deleted successfully');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Operation failed');
                    });
            };

            document.getElementById('addauthorForm').onsubmit = function (event) {
                event.preventDefault();
                const formData = new FormData(this);

                fetch('/authors', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(errorData => {
                                throw new Error(errorData.message || 'Network response was not ok');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        alert('Operation successful');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Operation failed: ' + error.message);
                    });
            };
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/get-categories')
                .then(response => response.json())
                .then(categories => {
                    const categorySelect = document.getElementById('category');
                    categories.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        categorySelect.appendChild(option);
                    });
                });

            fetch('/get-authors')
                .then(response => response.json())
                .then(authors => {
                    const authorSelect = document.getElementById('author');
                    authors.forEach(author => {
                        const option = document.createElement('option');
                        option.value = author.id;
                        option.textContent = author.name;
                        authorSelect.appendChild(option);
                    });
                });
        });


        $(document).ready(function () {
            $("#delCategoryName").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "/api/categories",
                        data: {query: request.term},
                        success: function (data) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function (event, ui) {
                    $("#delCategoryName").val(ui.item.label);
                    $("#categoryId").val(ui.item.value);
                    return false;
                },
                appendTo: "#mydiv5" // Ensure it appends to a container with enough space
            });
        });

        $(document).ready(function () {
            $("#delAuthorName").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "/api/authors",
                        data: {query: request.term},
                        success: function (data) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function (event, ui) {
                    $("#delAuthorName").val(ui.item.label);
                    $("#authorId").val(ui.item.value);
                    return false;
                },
                appendTo: "#mydiv6" // Ensure it appends to a container with enough space
            });

            $(document).ready(function () {
                $("#delAuthorName").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "/api/books",
                            data: {query: request.term},
                            success: function (data) {
                                response($.map(data, function (item) {
                                    return {
                                        label: item.name,
                                        value: item.id
                                    };
                                }));
                            }
                        });
                    },
                    select: function (event, ui) {
                        $("#delAuthorName").val(ui.item.label);
                        $("#authorId").val(ui.item.value);
                        return false;
                    },
                    appendTo: "#mydiv4" // Ensure it appends to a container with enough space
                });
            });
        });

        $(document).ready(function () {
            $("#delBookName").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "/api/books",
                        data: {query: request.term},
                        success: function (data) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.title,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function (event, ui) {
                    $("#delBookName").val(ui.item.label);
                    $("#bookId").val(ui.item.value);
                    return false;
                },
                appendTo: "#mydiv4" // Ensure it appends to a container with enough space
            });
        });

    </script>
</x-layout>
