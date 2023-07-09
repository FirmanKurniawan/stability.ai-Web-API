<!DOCTYPE html>
<html>
<head>
    <title>Stable Diffusion AI</title>
    <style>
        .container {
            display: flex;
        }

        .form-container {
            width: 50%;
            padding: 20px;
        }

        .image-container {
            width: 50%;
            padding: 20px;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Model Stable Diffusion v2.1-768</h1>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="index.php">
                <div>
                    <label for="text_prompts">Text Prompts:</label><br>
                    <textarea id="text_prompts" name="text_prompts[]" rows="5" cols="40" required></textarea>
                </div>
                <div>
                    <label for="style_preset">Style Preset:</label>
                    <select id="style_preset" name="style_preset" required>
                        <option value="analog-film">Analog Film</option>
                        <option value="anime">Anime</option>
                        <option value="cinematic">Cinematic</option>
                        <option value="comic-book">Comic Book</option>
                        <option value="digital-art">Digital Art</option>
                        <option value="enhance">Enhance</option>
                        <option value="fantasy-art">Fantasy Art</option>
                        <option value="isometric">Isometric</option>
                        <option value="line-art">Line Art</option>
                        <option value="low-poly">Low Poly</option>
                        <option value="modeling-compound">Modeling Compound</option>
                        <option value="neon-punk">Neon Punk</option>
                        <option value="origami">Origami</option>
                        <option value="photographic">Photographic</option>
                        <option value="pixel-art">Pixel Art</option>
                        <option value="3d-model">3D Model</option>
                        <option value="tile-texture">Tile Texture</option>
                    </select>
                </div>
                <div>
                    <label for="samples">Samples (Jumlah):</label>
                    <select id="samples" name="samples" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div>
                    <label for="size">Height & Width (Ukuran):</label>
                    <select id="size" name="size" required>
                        <option value="512">512</option>
                        <option value="576">576</option>
                        <option value="640">640</option>
                        <option value="704">704</option>
                        <option value="768">768</option>
                        <option value="832">832</option>
                        <option value="896">896</option>
                        <option value="960">960</option>
                        <option value="1024">1024</option>
                        <option value="1088">1088</option>
                        <option value="1152">1152</option>
                    </select>
                </div>
                <div>
                    <label for="weight">Weight (Optional):</label>
                    <input type="number" id="weight" name="weight" value="0.5" required>
                </div>
                <div>
                    <label for="cfg_scale">cfg_scale (Optional):</label>
                    <input type="number" id="cfg_scale" name="cfg_scale" min="0" value="7" required>
                </div>
                <div>
                    <label for="steps">Steps (Optional):</label>
                    <input type="number" id="steps" name="steps" value="50" required>
                </div>
                <div>
                    <label for="clip_guidance_preset">clip_guidance_preset (Optional):</label>
                    <select id="clip_guidance_preset" name="clip_guidance_preset" required>
                        <option value="NONE">NONE</option>
                        <option value="FAST_BLUE">FAST_BLUE</option>
                        <option value="FAST_GREEN">FAST_GREEN</option>
                        <option value="SIMPLE">SIMPLE</option>
                        <option value="SLOW">SLOW</option>
                        <option value="SLOWER">SLOWER</option>
                        <option value="SLOWEST">SLOWEST</option>
                    </select>
                </div>
                <div>
                    <label for="size">Sampler (Optional):</label>
                    <select id="sampler" name="sampler" required>
                        <option value="K_EULER">K_EULER</option>
                        <option value="DDIM">DDIM</option>
                        <option value="DDPM">DDPM</option>
                        <option value="K_DPMPP_2M">K_DPMPP_2M</option>
                        <option value="K_DPMPP_2S_ANCESTRAL">K_DPMPP_2S_ANCESTRAL</option>
                        <option value="K_DPM_2">K_DPM_2</option>
                        <option value="K_DPM_2_ANCESTRAL">K_DPM_2_ANCESTRAL</option>
                        <option value="K_EULER_ANCESTRAL">K_EULER_ANCESTRAL</option>
                        <option value="K_HEUN">K_HEUN</option>
                        <option value="K_LMS">K_LMS</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Generate">
                </div>
            </form>
        </div>
        <div class="image-container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $url = "https://api.stability.ai/v1/generation/stable-diffusion-768-v2-1/text-to-image";
                $apiKey = "sk-zGcFgWZP3AL2ZHfe2ukb8xbtVlpkuddpvfyc3xREwPHLWSWn";
            
                $headers = array(
                    "Accept: application/json",
                    "Authorization: $apiKey",
                    "Content-Type: application/json",
                    "Cookie: __cf_bm=B18GrV28l.o.ttbzw2d3NgLefmVYDlCLOmfi8xd2V3s-1688878393-0-ATvj9ThjyUPOhR/uz0hRXxDdL7OeUz26xFeWaZgUL6fi88QDN2Jh7we8X8KUlMdffrRRj1NgG0L7obt+/9r2sTU="
                );
            
                $textPrompts = $_POST['text_prompts'];
                $stylePreset = $_POST['style_preset'];
                $samples = $_POST['samples'];
                $size = $_POST['size'];
                $sampler = $_POST['sampler'];
                $weight = $_POST['weight'];
                $cfg_scale = $_POST['cfg_scale'];
                $clip_guidance_preset = $_POST['clip_guidance_preset'];
                $seed = $_POST['seed'];
                $steps = $_POST['steps'];
            
                $data = array(
                    "height" => intval($size),
                    "width" => intval($size),
                    "cfg_scale" => 7.5,
                    "clip_guidance_preset" => "NONE",
                    "sampler" => $sampler,
                    "weight" => floatval($weight),
                    "cfg_scale" => floatval($cfg_scale),
                    "clip_guidance_preset" => $clip_guidance_preset,
                    "seed" => intval($seed),
                    "steps" => intval($steps),
                    "style_preset" => $stylePreset,
                    "samples" => intval($samples),
                    "text_prompts" => array()
                );
            
                foreach ($textPrompts as $textPrompt) {
                    $data['text_prompts'][] = array(
                        "text" => $textPrompt,
                        "weight" => 0.5
                    );
                }
            
                $jsonData = json_encode($data);
            
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
                $response = curl_exec($ch);
                curl_close($ch);
            
                // Process the response
                if ($response !== false) {
                    $response = json_decode($response, true);
                    $artifacts = $response['artifacts'] ?? array();
                    foreach ($artifacts as $artifact) {
                        $imageData = $artifact['base64'];
                        $imageSrc = "data:image/png;base64," . $imageData;
                        echo "<img src='$imageSrc' alt='Generated Image'><br>";
                        echo "<a href='$imageSrc' download>Download Image</a><br><br>";
                    }
                } else {
                    // Terjadi kesalahan dalam melakukan permintaan
                    echo "Failed to retrieve image";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
