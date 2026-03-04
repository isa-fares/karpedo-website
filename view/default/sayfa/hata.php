<?php

/**
 * 404 Error Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */
header("HTTP/1.0 404 Not Found");
// ============================================
// PAGE CONFIGURATION
// ============================================
$sayfa = "Hata";
$baslik = $this->lang->genel('error_404_title');
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);
$this->ogBaslik = $this->sayfaBaslik;
$this->ogUrl = $this->fullUrl;

// ============================================
// URL CONSTANTS
// ============================================
$urls = [
	'home' => $this->baseURL('index', $lang, 1),
];

?>
<div class="error-404-wrapper">
	<div class="error-404-inner">
		<div class="error-404-code">404</div>
		<h1 class="error-404-text">Sayfa bulunamadı</h1>

		<div class="error-404-buttons">
			<a href="<?= $urls['home'] ?>" class="error-404-btn primary">
				Anasayfa
			</a>
			<a href="javascript:history.back(-1)" class="error-404-btn secondary">
				Geri
			</a>
		</div>
	</div>
</div>

<style>
	.error-404-wrapper {
		min-height: calc(100vh - 200px);
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		background-color: #ffffff;
		padding: 60px 20px;
	}

	.error-404-inner {
		padding: 40px;
		max-width: 600px;
		width: 100%;
	}

	.error-404-code {
		font-size: 120px;
		font-weight: 700;
		line-height: 1;
		color: #30363D;
		margin-bottom: 20px;
		font-family: "Plus Jakarta Sans", sans-serif;
		letter-spacing: -4px;
	}



	.error-404-text {
		font-size: 32px;
		margin: 0 0 40px;
		color: #30363D !important;
		line-height: 1.6;
		font-family: "Manrope", sans-serif;
	}

	.error-404-buttons {
		display: inline-flex;
		gap: 15px;
		flex-wrap: wrap;
		justify-content: center;
	}

	.error-404-btn {
		display: inline-block;
		padding: 16px 32px;
		border-radius: 4px;
		font-size: 16px;
		font-weight: 600;
		text-decoration: none;
		border: 2px solid transparent;
		transition: all 0.3s ease;
		font-family: "Manrope", sans-serif;
	}

	.error-404-btn.primary {
		background-color: #30363D;
		border-color: #30363D;
		color: #ffffff;
	}

	.error-404-btn.primary:hover {
		background-color: #30363D;
		border-color: #30363D;
		color: #ffffff;
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(30, 36, 41, 0.3);
	}

	.error-404-btn.secondary {
		background-color: #ffffff;
		border-color: #30363D;
		color: #30363D;
	}

	.error-404-btn.secondary:hover {
		background-color: #30363D;
		border-color: #30363D;
		color: #ffffff;
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(30, 36, 41, 0.3);
	}

	@media (max-width: 575px) {
		.error-404-wrapper {
			padding: 40px 15px;
		}

		.error-404-inner {
			padding: 20px;
		}

		.error-404-code {
			font-size: 80px;
			letter-spacing: -2px;
		}


		.error-404-text {
			font-size: 16px;
			margin-bottom: 30px;
		}

		.error-404-btn {
			padding: 14px 28px;
			font-size: 14px;
			width: 100%;
			max-width: 200px;
		}

		.error-404-buttons {
			flex-direction: column;
			align-items: center;
		}
	}
</style>