<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) : ?>
    <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'admin.css' ?>">

    <!-- <body onload="onload()"> -->

    <body>
        <button id="add-product">Thêm sản phẩm</button>
        <div id="edit-product-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form>
                    <h3 id="modal-title"></h3>
                    <div class="form-group">
                        <label for="Name">Product name:</label>
                        <input id="Name" name="Name" />
                    </div>
                    <div class="form-group">
                        <label for="CategoryId">CategoryId:</label>
                        <input id="CategoryId" name="CategoryId" />
                    </div>
                    <div class="form-group">
                        <label for="SubCategoryId">SubCategoryId:</label>
                        <input id="SubCategoryId" name="SubCategoryId" />
                    </div>
                    <div class="form-group">
                        <label for="Description">Description:</label>
                        <input id="Description" name="Description" />
                    </div>
                    <div class="form-group">
                        <label for="Description">Description:</label>
                        <input id="Description" name="Description" />
                    </div>
                    <div class="form-group">
                        <label for="Price">Price:</label>
                        <input id="Price" name="Price" />
                    </div>
                    <div class="form-group">
                        <label for="Color">Color:</label>
                        <input id="Color" name="Color" />
                    </div>
                    <div class="form-group">
                        <label for="Material">Material:</label>
                        <input id="Material" name="Material" />
                    </div>
                    <div class="form-group">
                        <label for="Size">Size:</label>
                        <input id="Size" name="Size" />
                    </div>
                    <div class="form-group">
                        <label for="isSaleOff">isSaleOff:</label>
                        <input id="isSaleOff" name="isSaleOff" />
                    </div>
                    <div class="form-group">
                        <label for="Percent_off">Percent_off:</label>
                        <input id="Percent_off" name="Percent_off" />
                    </div>
                    <div class="form-group">
                        <label for="Image1">Image1:</label>
                        <input id="Image1" name="Image1" />
                    </div>
                    <div class="form-group">
                        <label for="Alias">Alias:</label>
                        <input id="Alias" name="Alias" />
                    </div>
                    <div class="form-group">
                        <label for="Quantity">Quantity:</label>
                        <input id="Quantity" name="Quantity" />
                    </div>
                </form>
            </div>
        </div>
        <div id="delete-product-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Xoá sản phẩm</h3>
            </div>
        </div>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Danh mục con</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Màu sắc</th>
                        <th>Vật liệu</th>
                        <th>Kích thước</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Đang khuyến mãi</th>
                        <th>% khuyến mãi</th>
                        <th style="max-width: 200px">Ảnh sản phẩm</th>
                        <th>Alias</th>
                        <th>Số lượng</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-body"></tbody>
            </table>
        </div>
        <div class="pagination">
            <div id="pagination" class="page">
                <!-- <a href="#" onclick="pageChange(page - 1)">&laquo;</a> -->
                <!-- <ng-container *ngFor="let p of pageSelect">
          <a
            href="#"
            (click)="pageChange(p)"
            [class]="page == p ? 'active' : ''"
            >{{ p }}</a
          >
        </ng-container> -->
                <!-- <a href="#" (click)="pageChange(page + 1)">&raquo;</a> -->
            </div>
            <div class="select">
                Page size
                <select id="select-page-size" style="margin-right: 5px">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                Total: <span id="total-items"></span>
            </div>
        </div>
    </body>


    <script>
        let filter = {
            pageSize: 10,
            currentPage: 1,
        };
        document.addEventListener("DOMContentLoaded", async function() {
            getData(filter);
            let selectPageSize = document.getElementById("select-page-size");
            selectPageSize.addEventListener("change", pageSizeChange);
        });
        var maxPage, page, size;

        function getData(filter) {
            // return new Promise(function(resolve, reject) {
            var url = "?url=admin/view&api";
            let data = [];
            var xmlhttp = new XMLHttpRequest();
            let rNumb = filter.pageSize;
            xmlhttp.open('GET', url, true);
            xmlhttp.send();
            xmlhttp.responseType = 'json';
            xmlhttp.onreadystatechange =
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4) {
                        response = xmlhttp.response
                        console.log(response.data)
                        if (response.success) {
                            data = response.data
                            renderTable({
                                products: data,
                                total: rNumb * 10,
                                pageSize: filter.pageSize,
                                currentPage: filter.currentPage,
                            })
                        } else {

                        }
                    }
                }

            //     resolve();
            // });
        }

        function renderTable(data) {
            let products = data.products || [];
            let total = data.total || 0;
            let pageSize = data.pageSize || 10;
            let currentPage = data.currentPage || 1;
            let tableBody = document.querySelector(
                ".table-wrapper .table .table-body"
            );
            if (products.length == 0) {
                tableBody.innerHTML = `
            <tr>
              <td style="height: 500px; text-align: center;" colspan="17">Không có dữ liệu</td>
              </tr>
              `;
                return;
            }
            tableBody.innerHTML = "";
            for (let productItem of products) {
                let product = productItem.Product
                let tr = document.createElement("tr");
                tr.appendChild(createTD(product.Name));
                tr.appendChild(createTD(product.CategoryId));
                tr.appendChild(createTD(product.SubCategoryId));
                tr.appendChild(createTD(product.Description));
                tr.appendChild(createTD(product.Price));
                tr.appendChild(createTD(product.Color));
                tr.appendChild(createTD(product.Material));
                tr.appendChild(createTD(product.Size));
                tr.appendChild(createTD(formatDate(product.Createdate)));
                tr.appendChild(createTD(formatDate(product.EditDate)));
                tr.appendChild(createTD(product.isSaleOff == 1 ? "Có" : "Không"));
                tr.appendChild(createTD(product.Percent_off));
                let imgs = [
                    createLink(product.Image1, "Image1"),
                    createLink(product.Image2, "Image2"),
                    createLink(product.Image3, "Image3"),
                    createLink(product.Image4, "Image4"),
                ];
                let imgsElement = createTD(imgs);
                imgsElement.style.maxWidth = "200px";
                imgsElement.style.wordBreak = "break-all";
                tr.appendChild(imgsElement);
                tr.appendChild(createTD(product.Alias));
                tr.appendChild(createTD(product.Quantity));
                tr.appendChild(createTDAction(product));
                tableBody.append(tr);
            }
            renderPagination(total, pageSize, currentPage);
        }

        function renderPagination(total, pageSize, currentPage) {
            maxPage = Math.ceil(total / pageSize);
            page = currentPage;
            size = pageSize;
            let pageSelect = [];
            if (maxPage <= 1) {
                pageSelect = [1];
            } else if (currentPage < 3) {
                pageSelect.push(...[1, 2]);
                for (let i = 3; i < 6; i++) {
                    if (i < maxPage) pageSelect.push(i);
                }
            } else if (currentPage > maxPage - 2) {
                for (let i = maxPage; i > maxPage - 5; i--) {
                    pageSelect.unshift(i);
                }
            } else {
                for (let i = currentPage - 2; i < currentPage + 3; i++) {
                    pageSelect.push(i);
                }
            }

            let totalElement = document.getElementById("total-items");
            totalElement.innerText = total;
            let pagination = document.getElementById("pagination");
            pagination.innerHTML = "";
            let prev = document.createElement("a");
            prev.innerText = "Prev";
            prev.addEventListener("click", () => pageChange(page - 1));
            pagination.appendChild(prev);

            for (let p of pageSelect) {
                let curPageElement = document.createElement("a");
                curPageElement.innerText = p;
                if (page == p) {
                    curPageElement.classList.add("active");
                }
                curPageElement.addEventListener("click", () => pageChange(p));
                pagination.appendChild(curPageElement);
            }

            let next = document.createElement("a");
            next.innerText = "Next";
            next.addEventListener("click", () => pageChange(page + 1));
            pagination.appendChild(next);
        }

        function pageChange(p) {
            if (p < 1) p = 1;
            if (p > maxPage) p = maxPage;
            if (p == page) return;
            let filter = {
                pageSize: size,
                currentPage: p,
            };
            getData(filter);
        }

        function createTD(childNode) {
            let td = document.createElement("td");
            if (Array.isArray(childNode)) {
                childNode.forEach((e) => td.append(e));
                return td;
            }
            td.append(childNode);
            return td;
        }

        function createLink(url, text) {
            let link = document.createElement("a");
            link.setAttribute("href", "public/images/product/" + url);
            link.setAttribute("target", "blank");
            link.innerText = text;
            link.style.marginRight = "5px";
            return link;
        }

        function createTDAction(row) {
            let td = document.createElement("td");
            let buttonEdit = createLinkButton("Edit", () => editRow(row));
            let buttonDelete = createLinkButton("Delete", () => deleteRow(row));
            td.append(buttonEdit);
            td.append(buttonDelete);
            return td;
        }

        function createLinkButton(name, callback) {
            let btn = document.createElement("span");
            btn.classList.add("link-btn");
            btn.innerText = name;
            btn.addEventListener("click", callback);
            return btn;
        }

        function editRow(row) {
            let modal = document.getElementById("edit-product-modal");
            modal.style.display = "block";
            let modalTitle = document.getElementById("modal-title");
            modalTitle.innerText = "Sửa sản phẩm";
            console.log(row);
        }

        function deleteRow(row) {
            let modal = document.getElementById("delete-product-modal");
            modal.style.display = "block";
            let modalTitle = document.getElementById("modal-title");
            modalTitle.innerText = "Sửa sản phẩm";
            console.log(row);
        }

        function onload() {
            let filter = {
                pageSize: 10,
                currentPage: 1,
            };
            getData(filter);
            let selectPageSize = document.getElementById("select-page-size");
            selectPageSize.addEventListener("change", pageSizeChange);
            initModal();
        }

        function formatDate(date) {
            // let hours = date.getHours();
            // let minutes = date.getMinutes();
            // let ampm = hours >= 12 ? "pm" : "am";
            // hours = hours % 12;
            // hours = hours ? hours : 12;
            // minutes = minutes < 10 ? "0" + minutes : minutes;
            // let strTime = hours + ":" + minutes + " " + ampm;
            // return (
            //     date.getDate() +
            //     "/" +
            //     (date.getMonth() + 1) +
            //     "/" +
            //     date.getFullYear() +
            //     "  " +
            //     strTime
            // );
            return date
        }

        function pageSizeChange(e) {
            let pageSize = e.target.value;
            let filter = {
                pageSize,
                currentPage: 1,
            };
            getData(filter);
        }

        function initModal() {
            let modal = document.getElementById("edit-product-modal");
            let modalDelete = document.getElementById("delete-product-modal");

            let btn = document.getElementById("add-product");
            let spans = document.getElementsByClassName("close");

            btn.onclick = function() {
                modal.style.display = "block";
                let modalTitle = document.getElementById("modal-title");
                modalTitle.innerText = "Thêm sản phẩm";
            };
            for (let span of spans) {
                span.onclick = function() {
                    modal.style.display = "none";
                    modalDelete.style.display = "none";
                };
            }

            window.onclick = function(event) {
                if (event.target == modal || event.target == modalDelete) {
                    modal.style.display = "none";
                    modalDelete.style.display = "none";
                }
            };
        }
    </script>

<?php endif ?>