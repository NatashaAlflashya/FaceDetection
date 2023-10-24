<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Kalkulator BMI</h4>
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="150">
                            <label for="tinggi_badan">Tinggi Badan (CM)</label>
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan" placeholder="50">
                            <label for="berat_badan">Berat Badan (KG)</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 mt-3 w-100">Hitung BMI</button>
                    </form>

                    <!-- Hasil perhitungan BMI -->
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tinggi_badan = $_POST["tinggi_badan"] / 100; // Ubah dari cm ke m
                        $berat_badan = $_POST["berat_badan"];

                        if (empty($tinggi_badan) || empty($berat_badan)) {
                            echo "<div class='alert alert-danger'>Tinggi badan dan berat badan tidak boleh kosong.</div>";
                        } else {
                            $bmi = $berat_badan / ($tinggi_badan * $tinggi_badan);
                            echo "<div class='alert alert-success'>BMI: " . number_format($bmi, 2) . "</div>";
                            
                            // Menentukan status BMI
                            if ($bmi < 18.5) {
                                echo "Status BMI: Kurang berat badan";
                            } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                                echo "Status BMI: Normal";
                            } elseif ($bmi >= 25.0 && $bmi < 39.9){
                                echo"overweight"
                            }elseif ($bmi >=40)
                                echo"obese"{
                                
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>