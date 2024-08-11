"use strict";

// Class definition
var KTAuthI18nDemo = function() {
    // Elements
    var menu;

	var menuObj;

	var translationStrings = {
		// General
		"general-progress" : {
			"English" : "Please wait...",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},
		"general-desc" : {
			"English" : "Get unlimited access & earn money",
			"Spanish" : "Obtenga acceso ilimitado y gane dinero",
			"German" : "Erhalten Sie unbegrenzten Zugriff und verdienen Sie Geld",
			"Japanese" : "ç„¡åˆ¶é™ã®ã‚¢ã‚¯ã‚»ã‚¹ã‚’å–å¾—ã—ã¦ãŠé‡‘ã‚’ç¨¼ã",
			"French" : "Obtenez un accÃ¨s illimitÃ© et gagnez de l'argent",
		},

		"general-or" : {
			"English" : "Or",
			"Spanish" : "O",
			"German" : "Oder",
			"Japanese" : "ã¾ãŸã¯",
			"French" : "Ou",
		},

		// Sign in
		"sign-in-head-desc" : {
			"English" : "Not a Member yet?",
			"Spanish" : "Â¿No eres miembro todavÃ­a?",
			"German" : "Noch kein Mitglied?",
			"Japanese" : "ã¾ã ãƒ¡ãƒ³ãƒãƒ¼ã§ã¯ã‚ã‚Šã¾ã›ã‚“ã‹ï¼Ÿ",
			"French" : "Pas encore membre?",
		},

		"sign-in-head-link" : {
			"English" : "Sign Up",
			"Spanish" : "Inscribirse",
			"German" : "Anmeldung",
			"Japanese" : "ã‚µã‚¤ãƒ³ã‚¢ãƒƒãƒ—",
			"French" : "S'S'inscrire",
		},

		"sign-in-title" : {
			"English" : "Sign In",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"sign-in-input-email" : {
			"English" : "Email",
			"Spanish" : "Correo electrÃ³nico",
			"German" : "Email",
			"Japanese" : "Eãƒ¡ãƒ¼ãƒ«",
			"French" : "E-mail",
		},

		"sign-in-input-password" : {
			"English" : "Password",
			"Spanish" : "Clave",
			"German" : "Passwort",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰",
			"French" : "Mot de passe",
		},

		"sign-in-forgot-password" : {
			"English" : "Forgot Password ?",
			"Spanish" : "Has olvidado tu contraseÃ±a ?",
			"German" : "Passwort vergessen ?",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’ãŠå¿˜ã‚Œã§ã™ã‹ ï¼Ÿ",
			"French" : "Mot de passe oubliÃ© ?",
		},

		"sign-in-submit" : {
			"English" : "Sign In",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		// Sing up
		"sign-up-head-desc" : {
			"English" : "Already a member ?",
			"Spanish" : "Ya eres usuario ?",
			"German" : "Schon ein Mitglied ?",
			"Japanese" : "ã™ã§ã«ãƒ¡ãƒ³ãƒãƒ¼ã§ã™ã‹ï¼Ÿ",
			"French" : "DÃ©jÃ  membre ?",
		},

		"sign-up-head-link" : {
			"English" : "Sign In",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"sign-up-title" : {
			"English" : "Sign Up",
			"Spanish" : "Inscribirse",
			"German" : "Anmeldung",
			"Japanese" : "ã‚µã‚¤ãƒ³ã‚¢ãƒƒãƒ—",
			"French" : "S'S'inscrire",
		},

		"sign-up-input-first-name" : {
			"English" : "First Name",
			"Spanish" : "Primer nombre",
			"German" : "Vorname",
			"Japanese" : "ãƒ•ã‚¡ãƒ¼ã‚¹ãƒˆãƒãƒ¼ãƒ ",
			"French" : "PrÃ©nom",
		},

		"sign-up-input-last-name" : {
			"English" : "Last Name",
			"Spanish" : "Apellido",
			"German" : "Nachname",
			"Japanese" : "è‹—å­—",
			"French" : "Nom de famille",
		},

		"sign-up-input-email" : {
			"English" : "Email",
			"Spanish" : "Correo electrÃ³nico",
			"German" : "Email",
			"Japanese" : "Eãƒ¡ãƒ¼ãƒ«",
			"French" : "E-mail",
		},

		"sign-up-input-password" : {
			"English" : "Password",
			"Spanish" : "Clave",
			"German" : "Passwort",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰",
			"French" : "Mot de passe",
		},

		"sign-up-input-confirm-password" : {
			"English" : "Password",
			"Spanish" : "Clave",
			"German" : "Passwort",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰",
			"French" : "Mot de passe",
		},

		"sign-up-submit" : {
			"English" : "Submit",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"sign-up-hint" : {
			"English" : "Use 8 or more characters with a mix of letters, numbers & symbols.",
			"Spanish" : "Utilice 8 o mÃ¡s caracteres con una combinaciÃ³n de letras, nÃºmeros y sÃ­mbolos.",
			"German" : "Verwenden Sie 8 oder mehr Zeichen mit einer Mischung aus Buchstaben, Zahlen und Symbolen.",
			"Japanese" : "æ–‡å­—ã€æ•°å­—ã€è¨˜å·ã‚’çµ„ã¿åˆã‚ã›ãŸ8æ–‡å­—ä»¥ä¸Šã‚’ä½¿ç”¨ã—ã¦ãã ã•ã„ã€‚",
			"French" : "Utilisez 8 caractÃ¨res ou plus avec un mÃ©lange de lettres, de chiffres et de symboles.",
		},

		// New password
		"new-password-head-desc" : {
			"English" : "Already a member ?",
			"Spanish" : "Ya eres usuario ?",
			"German" : "Schon ein Mitglied ?",
			"Japanese" : "ã™ã§ã«ãƒ¡ãƒ³ãƒãƒ¼ã§ã™ã‹ï¼Ÿ",
			"French" : "DÃ©jÃ  membre ?",
		},

		"new-password-head-link" : {
			"English" : "Sign In",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"new-password-title" : {
			"English" : "Setup New Password",
			"Spanish" : "Configurar nueva contraseÃ±a",
			"German" : "Neues Passwort einrichten",
			"Japanese" : "æ–°ã—ã„ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’è¨­å®šã™ã‚‹",
			"French" : "Configurer un nouveau mot de passe",
		},

		"new-password-desc" : {
			"English" : "Have you already reset the password ?",
			"Spanish" : "Â¿Ya has restablecido la contraseÃ±a?",
			"German" : "Hast du das Passwort schon zurÃ¼ckgesetzt?",
			"Japanese" : "ã™ã§ã«ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’ãƒªã‚»ãƒƒãƒˆã—ã¾ã—ãŸã‹ï¼Ÿ",
			"French" : "Avez-vous dÃ©jÃ  rÃ©initialisÃ© le mot de passe ?",
		},

		"new-password-input-password" : {
			"English" : "Password",
			"Spanish" : "Clave",
			"German" : "Passwort",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰",
			"French" : "Mot de passe",
		},

		"new-password-hint" : {
			"English" : "Use 8 or more characters with a mix of letters, numbers & symbols.",
			"Spanish" : "Utilice 8 o mÃ¡s caracteres con una combinaciÃ³n de letras, nÃºmeros y sÃ­mbolos.",
			"German" : "Verwenden Sie 8 oder mehr Zeichen mit einer Mischung aus Buchstaben, Zahlen und Symbolen.",
			"Japanese" : "æ–‡å­—ã€æ•°å­—ã€è¨˜å·ã‚’çµ„ã¿åˆã‚ã›ãŸ8æ–‡å­—ä»¥ä¸Šã‚’ä½¿ç”¨ã—ã¦ãã ã•ã„ã€‚",
			"French" : "Utilisez 8 caractÃ¨res ou plus avec un mÃ©lange de lettres, de chiffres et de symboles.",
		},

		"new-password-confirm-password" : {
			"English" : "Confirm Password",
			"Spanish" : "Confirmar contraseÃ±a",
			"German" : "Passwort bestÃ¤tigen",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’èªè¨¼ã™ã‚‹",
			"French" : "Confirmez le mot de passe",
		},

		"new-password-submit" : {
			"English" : "Submit",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		// Password reset
		"password-reset-head-desc" : {
			"English" : "Already a member ?",
			"Spanish" : "Ya eres usuario ?",
			"German" : "Schon ein Mitglied ?",
			"Japanese" : "ã™ã§ã«ãƒ¡ãƒ³ãƒãƒ¼ã§ã™ã‹ï¼Ÿ",
			"French" : "DÃ©jÃ  membre ?",
		},

		"password-reset-head-link" : {
			"English" : "Sign In",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"password-reset-title" : {
			"English" : "Forgot Password ?",
			"Spanish" : "Has olvidado tu contraseÃ±a ?",
			"German" : "Passwort vergessen ?",
			"Japanese" : "ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’ãŠå¿˜ã‚Œã§ã™ã‹ ï¼Ÿ",
			"French" : "Mot de passe oubliÃ© ?",
		},

		"password-reset-desc" : {
			"English" : "Enter your email to reset your password.",
			"Spanish" : "Ingrese su correo electrÃ³nico para restablecer su contraseÃ±a.",
			"German" : "Geben Sie Ihre E-Mail-Adresse ein, um Ihr Passwort zurÃ¼ckzusetzen.",
			"Japanese" : "ãƒ¡ãƒ¼ãƒ«ã‚¢ãƒ‰ãƒ¬ã‚¹ã‚’å…¥åŠ›ã—ã¦ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’ãƒªã‚»ãƒƒãƒˆã—ã¦ãã ã•ã„ã€‚",
			"French" : "Entrez votre e-mail pour rÃ©initialiser votre mot de passe.",
		},

		"password-reset-input-email" : {
			"English" : "Email",
			"Spanish" : "Correo electrÃ³nico",
			"German" : "Email",
			"Japanese" : "Eãƒ¡ãƒ¼ãƒ«",
			"French" : "E-mail",
		},

		"password-reset-submit" : {
			"English" : "Submit",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"password-reset-cancel" : {
			"English" : "Cancel",
			"Spanish" : "Cancelar",
			"German" : "Absagen",
			"Japanese" : "ã‚­ãƒ£ãƒ³ã‚»ãƒ«",
			"French" : "Annuler",
		},

		// Two steps
		"two-step-head-desc" : {
			"English" : "Didnâ€™t get the code ?",
			"Spanish" : "Â¿No recibiste el cÃ³digo?",
			"German" : "Code nicht erhalten?",
			"Japanese" : "ã‚³ãƒ¼ãƒ‰ã‚’å–å¾—ã§ãã¾ã›ã‚“ã§ã—ãŸã‹ï¼Ÿ",
			"French" : "Vous n'avez pas reÃ§u le codeÂ ?",
		},

		"two-step-head-resend" : {
			"English" : "Resend",
			"Spanish" : "Reenviar",
			"German" : "Erneut senden",
			"Japanese" : "å†é€",
			"French" : "Renvoyer",
		},

		"two-step-head-or" : {
			"English" : "Or",
			"Spanish" : "O",
			"German" : "Oder",
			"Japanese" : "ã¾ãŸã¯",
			"French" : "Ou",
		},

		"two-step-head-call-us" : {
			"English" : "Call Us",
			"Spanish" : "LlÃ¡menos",
			"German" : "Rufen Sie uns an",
			"Japanese" : "ãŠé›»è©±ãã ã•ã„",
			"French" : "Appelez-nous",
		},

		"two-step-submit" : {
			"English" : "Submit",
			"Spanish" : "Iniciar SesiÃ³n",
			"German" : "Registrarse",
			"Japanese" : "ãƒ­ã‚°ã‚¤ãƒ³",
			"French" : "S'identifier",
		},

		"two-step-title" : {
			"English" : "Two Step Verification",
			"Spanish" : "VerificaciÃ³n de dos pasos",
			"German" : "Verifizierung in zwei Schritten",
			"Japanese" : "2æ®µéšŽèªè¨¼",
			"French" : "VÃ©rification en deux Ã©tapes",
		},

		"two-step-deck" : {
			"English" : "Enter the verification code we sent to",
			"Spanish" : "Ingresa el cÃ³digo de verificaciÃ³n que enviamos a",
			"German" : "Geben Sie den von uns gesendeten BestÃ¤tigungscode ein",
			"Japanese" : "é€ä¿¡ã—ãŸç¢ºèªã‚³ãƒ¼ãƒ‰ã‚’å…¥åŠ›ã—ã¦ãã ã•ã„",
			"French" : "Entrez le code de vÃ©rification que nous avons envoyÃ© Ã ",
		},

		"two-step-label" : {
			"English" : "Type your 6 digit security code",
			"Spanish" : "Escriba su cÃ³digo de seguridad de 6 dÃ­gitos",
			"German" : "Geben Sie Ihren 6-stelligen Sicherheitscode ein",
			"Japanese" : "6æ¡ã®ã‚»ã‚­ãƒ¥ãƒªãƒ†ã‚£ã‚³ãƒ¼ãƒ‰ã‚’å…¥åŠ›ã—ã¾ã™",
			"French" : "Tapez votre code de sÃ©curitÃ© Ã  6 chiffres",
		}
	}

    // Handle form
    var translate = function(lang) {
        for (var label in translationStrings) {
			if (translationStrings.hasOwnProperty(label)) {
				if (translationStrings[label][lang]) {
					let labelElement = document.querySelector('[data-kt-translate=' + label + ']');

					if (labelElement !== null) {
						if (labelElement.tagName === "INPUT") {
							labelElement.setAttribute("placeholder", translationStrings[label][lang]);
						} else {
							labelElement.innerHTML = translationStrings[label][lang];
						}
					}
				}
			}
		}
    }

	var setLanguage = function(lang) {
		const selectedLang = menu.querySelector('[data-kt-lang="' + lang + '"]');

		if (selectedLang !== null) {
			const currentLangName = document.querySelector('[data-kt-element="current-lang-name"]');
			const currentLangFlag = document.querySelector('[data-kt-element="current-lang-flag"]');

			const selectedLangName = selectedLang.querySelector('[data-kt-element="lang-name"]');
			const selectedLangFlag = selectedLang.querySelector('[data-kt-element="lang-flag"]');

			currentLangName.innerText = selectedLangName.innerText;
			currentLangFlag.setAttribute("src", selectedLangFlag.getAttribute("src"));

			localStorage.setItem("kt_auth_lang", lang);
		}
	}

	var init = function() {
		if ( localStorage.getItem("kt_auth_lang") !== null ) {
			let lang = localStorage.getItem("kt_auth_lang");

			setLanguage(lang);
			translate(lang);
		}

		menuObj.on("kt.menu.link.click", function(element) {
			let lang = element.getAttribute("data-kt-lang");

			setLanguage(lang);
			translate(lang);
		});
	}

    // Public functions
    return {
        // Initialization
        init: function() {
            menu = document.querySelector('#kt_auth_lang_menu');

			if (menu === null) {
				return;
			}

			menuObj = KTMenu.getInstance(menu);

            init();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAuthI18nDemo.init();
});
