 
        // Animation du formulaire
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtn');
            const text = document.getElementById('submitText');
            
            text.textContent = 'Création en cours...';
            btn.disabled = true;
            btn.classList.add('opacity-60');
        });

        // Validation du téléphone sénégalais
        document.getElementById('phone').addEventListener('input', function(e) {
            const phone = e.target.value.replace(/\D/g, '');
            const isValid = /^(77|78|76|75|70)\d{7}$/.test(phone);
            
            if (phone.length > 0) {
                if (isValid) {
                    e.target.classList.remove('border-red-500', 'bg-red-50');
                    e.target.classList.add('border-green-500', 'bg-green-50');
                } else {
                    e.target.classList.remove('border-green-500', 'bg-green-50');
                    e.target.classList.add('border-red-500', 'bg-red-50');
                }
            } else {
                e.target.classList.remove('border-red-500', 'bg-red-50', 'border-green-500', 'bg-green-50');
            }
        });
// nurmero cni
             const prenomInput = document.getElementById('prenom');
            const spinner = document.getElementById('spinner');
            document.getElementById('numerosCarteIdentite').addEventListener('input', function(e) {
              const cni = e.target.value;
               const cniPattern = /^[1-2][0-9]{12}$/;
              const successMsg = e.target.parentElement.querySelector('.success-message');
               const errorMsg = e.target.parentElement.querySelector('.error-message');

            if (cniPattern.test(cni)) {
                // successMsg.textContent = "verification en cours...";
                spinner.classList.toggle('hidden');
                successMsg.classList.remove('hidden');
                const response=validateCNI(cni);
                response.then(data => {
                    if (data.statut === "success") {
                        // console.log(data.da);
                        setFormData(data.data);
                        successMsg.textContent = data.message;
                        successMsg.classList.remove('hidden');
                    } else {
                        errorMsg.textContent = data.message;
                        errorMsg.classList.remove('hidden');
                    }
                    spinner.classList.toggle('hidden');

                });
            } else {
                   errorMsg.textContent = "Numéro de CNI est invalide (13 chiffres, commence par 1 ou 2)";
                   errorMsg.classList.remove('hidden');
                    successMsg.classList.add('hidden');
    }
  
});

        async function validateCNI(cni) {
            const result = await fetch(`https://application-daf.onrender.com/api/v1/citoyens/${cni}`);
            const response = await result.json();
           return response;    
        }
        function setFormData(data) {
            document.getElementById('prenom').value = data.prenom || '';
            document.getElementById('nom').value = data.nom || '';
            document.getElementById('date_naissance').value = data.date_naissance || '';
            document.getElementById('lieu_naissance').value = data.lieu_naissance || '';
            document.getElementById('copie_cni').value = data.copie_cni  || '';
        }

       
        // Validation de la confirmation du mot de passe
        document.getElementById('confirm_password').addEventListener('input', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = e.target.value;
            
            if (confirmPassword.length === 0) {
                e.target.classList.remove('border-red-500', 'bg-red-50', 'border-green-500', 'bg-green-50');
            } else if (password !== confirmPassword) {
                e.target.classList.remove('border-green-500', 'bg-green-50');
                e.target.classList.add('border-red-500', 'bg-red-50');
            } else {
                e.target.classList.remove('border-red-500', 'bg-red-50');
                e.target.classList.add('border-green-500', 'bg-green-50');
            }
        });

        // Validation des noms
        ['prenom', 'nom'].forEach(fieldId => {
            document.getElementById(fieldId).addEventListener('input', function(e) {
                const value = e.target.value;
                const isValid = /^[a-zA-ZÀ-ÿ\s\-']+$/.test(value) && value.length >= 2;
                
                if (value.length === 0) {
                    e.target.classList.remove('border-red-500', 'border-green-500');
                } else if (isValid) {
                    e.target.classList.remove('border-red-500');
                    e.target.classList.add('border-green-500');
                } else {
                    e.target.classList.remove('border-green-500');
                    e.target.classList.add('border-red-500');
                }
            });
        });

        

