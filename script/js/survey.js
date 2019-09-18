let obyeksurvey = document.querySelector("#obyeksurvey");
        let hiddenkategori = document.querySelector("#hiddenkategori");
        let btnQ = document.querySelectorAll("label.btn");

        // Memberikan tanda checked pada tombol yang ditekan
        btnQ.forEach(btnQa => btnQa.addEventListener("click", function () {
            btnQa.firstElementChild.setAttribute("checked", true);
        }));

        // GET parameter
        url = new URL(window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search);
        let searchParams = new URLSearchParams(url.search);
        let kategori = url.searchParams.get('kategori');

        // Menyematkan nilai kategori
        obyeksurvey.innerText = kategori;
        hiddenkategori.value = kategori;

        //Fungsi kirim data
        function fetchAPIPOST() {
            let inputkategori = kategori;
            let inputmesin = 1;
            let inputq1, inputq2, inputq3, inputq4, inputq5, inputq6, inputq7, inputq8, inputq9, inputq10 = 0;
            inputq1 = document.querySelector("[name='q1'][checked]") ? document.querySelector("[name='q1'][checked]").value : 50;
            inputq2 = document.querySelector("[name='q2'][checked]") ? document.querySelector("[name='q2'][checked]")
                .value : 50;
            inputq3 = document.querySelector("[name='q3'][checked]") ? document.querySelector("[name='q3'][checked]")
                .value : 50;
            inputq4 = document.querySelector("[name='q4'][checked]") ? document.querySelector("[name='q4'][checked]")
                .value : 50;
            inputq5 = document.querySelector("[name='q5'][checked]") ? document.querySelector("[name='q5'][checked]")
                .value : 50;
            inputq6 = document.querySelector("[name='q6'][checked]") ? document.querySelector("[name='q6'][checked]")
                .value : 50;
            inputq7 = document.querySelector("[name='q7'][checked]") ? document.querySelector("[name='q7'][checked]")
                .value : 50;
            inputq8 = document.querySelector("[name='q8'][checked]") ? document.querySelector("[name='q8'][checked]")
                .value : 50;
            inputq9 = document.querySelector("[name='q9'][checked]") ? document.querySelector("[name='q9'][checked]")
                .value : 50;
            inputq10 = document.querySelector("[name='q10'][checked]") ? document.querySelector("[name='q10'][checked]")
                .value : 50;

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
                    // window.location.href= "./terimakasih.html";
                    document.getElementById("btnKirimData").click();
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
        document.getElementById("btnKirimData").addEventListener("click", fetchAPIPOST);