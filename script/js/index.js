let btnQ = document.querySelectorAll("label.btn");

        // Memberikan tanda checked pada tombol yang ditekan
        btnQ.forEach(btnQa => btnQa.addEventListener("click", function () {
            btnQ.forEach(btnQaa => btnQaa.firstElementChild.removeAttribute("checked"));
            btnQa.firstElementChild.setAttribute("checked", true);
            fetchAPIPOST();

        }));

        //Fungsi kirim data
        function fetchAPIPOST() {
            let inputkategori = "singkat";
            let inputmesin = 1;
            let inputq1 = document.querySelector("[name='q1'][checked]") ? document.querySelector("[name='q1'][checked]").value : 50;
            let  inputq2, inputq3, inputq4, inputq5, inputq6, inputq7, inputq8, inputq9, inputq10 ;
            inputq2= inputq3= inputq4= inputq5= inputq6= inputq7= inputq8= inputq9= inputq10 = inputq1;


            let dataInput = "kategori=" + inputkategori + "&mesin=" + inputmesin + "&q1=" + inputq1 + "&q2=" + inputq2 + "&q3=" + inputq3 + "&q4=" + inputq4 + "&q5=" + inputq5 + "&q6=" + inputq6 + "&q7=" + inputq7 + "&q8=" + inputq8 + "&q9=" + inputq9 + "&q10=" + inputq10;

            url = 'api.php/pertanyaan';
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: dataInput
                })
                .then((resp) => resp.json())
                .then(function (data) {
                    tampilkanData(data);
                })
                .catch(function (error) {
                    console.log(JSON.stringify(error));
                });
        }

        // Fungsi untuk menampilkan data
        function tampilkanData(dataRAW) {
            console.log("Status: " + dataRAW.status + "<br/>");
            console.log("ID data: " + dataRAW.id);
        }