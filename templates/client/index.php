<?php
$errors = $_SESSION['errors'] ?? null;
$user = $_SESSION['user'] ?? null;
$comptePrincipal = $comptePrincipal ?? null;
$comptesSecondaires = $comptesSecondaires ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - Dashboard Bancaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'orange-primary': '#FF8303',
                        'orange-light': '#FFB366',
                        'gray-dark': '#2C2C2C',
                        'black-dark': '#1A1A1A',
                    },
                    // --- Added custom border width here ---
                    borderWidth: {
                        '10': '10px', // Custom border width of 10px
                    }
                    // ------------------------------------
                }
            }
        }
    </script>
    <style>
        /* No custom scrollbar needed if scrolling is removed */
    </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">
    <nav class="bg-white shadow-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="bg-orange-primary p-2 rounded-lg shadow-sm">
                        <i class="fas fa-university text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-extrabold text-orange-primary tracking-tight">Espace Client</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-circle text-gray-dark text-xl"></i>
                        <?php if($user): ?>
                        <span class="text-gray-dark font-semibold text-lg"><?= htmlspecialchars($user['prenom']) ?></span>
                        <?php endif; ?>
                    </div>
                    <form action="/logout" method='POST'>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-full text-base font-medium transition-all duration-300 ease-in-out shadow-md hover:shadow-lg">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-1">
        <aside class="w-64 bg-black-dark min-h-screen shadow-2xl relative pt-6">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-8 pb-6 border-b border-gray-700/50">
                    <div class="w-14 h-14 bg-orange-primary rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-white text-xl"></i>
                    </div>
                    <div>
                        <?php if($user && $comptePrincipal): ?>
                        <h3 class="text-white font-bold text-lg leading-tight"><?= htmlspecialchars($user['prenom']) ?></h3>
                        <p class="text-gray-300 text-sm mt-0.5"><?= htmlspecialchars($comptePrincipal['typeCompte']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <nav class="space-y-3">
                    <a href="" class="flex items-center space-x-4 text-white bg-orange-primary px-5 py-3 rounded-xl font-semibold transition-all duration-300 ease-in-out hover:bg-orange-light transform hover:scale-105 group shadow-lg">
                        <i class="fas fa-wallet text-white text-lg group-hover:text-white"></i>
                        <span>Mes comptes</span>
                    </a>
                    <a href="/account/create" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-plus-circle text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Créer un compte</span>
                    </a>
                    <a href="#transactions" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-exchange-alt text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Transactions</span>
                    </a>
                    <a href="#profile" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-user text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Mon profil</span>
                    </a>
                    <a href="#" class="flex items-center space-x-4 text-gray-300 hover:text-white hover:bg-gray-800 px-5 py-3 rounded-xl font-medium transition-all duration-300 ease-in-out group">
                        <i class="fas fa-cog text-orange-primary text-lg group-hover:text-orange-light"></i>
                        <span>Paramètres</span>
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 p-8 bg-gray-100 overflow-hidden">
            <?php if ($errors): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Oups!</strong>
                <span class="block sm:inline"><?= htmlspecialchars($errors) ?></span>
            </div>
            <?php endif; ?>

            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Tableau de bord</h1>
                <p class="text-gray-600 text-lg">Bienvenue dans votre espace client, gérez vos finances en toute simplicité.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
                <div class="bg-white rounded-2xl shadow-xl p-6 border-l-10 border-orange-primary transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-base font-medium text-gray-600 mb-2">Solde total</h6>
                            <span class="text-3xl font-bold text-gray-800">
                                <?php if($comptePrincipal): ?>
                                    <?= number_format($comptePrincipal['solde'], 0, ',', ' ') ?> CFA
                                <?php else: ?>
                                    0 CFA
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="bg-orange-primary p-4 rounded-full shadow-lg">
                            <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-6 border-l-10 border-orange-primary transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-base font-medium text-gray-600 mb-2">Numéro de compte principal</h6>
                            <span class="text-3xl font-bold text-gray-800">
                                <?php if($comptePrincipal): ?>
                                    <?= htmlspecialchars($comptePrincipal['numero']) ?>
                                <?php else: ?>
                                    Non disponible
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class=" overflow-hidden w-28 h-26 flex items-center justify-center bg-white shadow-lg">
                            <img src="/uploads/images/qrl.png" alt="Visuel MAXITSA" class="w-full h-full object-cover p-1">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-6 border-l-10 border-orange-primary transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-base font-medium text-gray-600 mb-2">Nombre de comptes</h6>
                            <span class="text-3xl font-bold text-gray-800">
                                <?= count($comptesSecondaires) + ($comptePrincipal ? 1 : 0) ?>
                            </span>
                            <p class="text-sm text-gray-500 mt-1">
                                <?= count($comptesSecondaires) ?> secondaire(s)
                            </p>
                        </div>
                        <div class="bg-green-500 p-4 rounded-full shadow-lg">
                            <i class="fas fa-wallet text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-7" id="transactions">
                <div class="flex items-center justify-between mb-6">
                    <h5 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list-alt mr-3 text-orange-primary"></i>
                        Dernières transactions
                    </h5>
                    <button class="text-orange-primary hover:text-orange-light text-base font-medium flex items-center transition-colors duration-300">
                        Voir tout <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </button>
                </div>
                
                <div class="overflow-hidden rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider rounded-tl-lg">Date/Heure</th>
                                <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">Type</th>
                                <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider rounded-tr-lg">Montant</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">18/07/2025 10:15</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminé</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Dépôt</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-green-600">+250 000 CFA</td>
                            </tr>
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">17/07/2025 16:45</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Échoué</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Retrait</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-red-600">-75 000 CFA</td>
                            </tr>
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">16/07/2025 09:00</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">En-cours</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Virement</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-blue-600">-120 000 CFA</td>
                            </tr>
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">15/07/2025 14:30</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminé</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Dépôt</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-green-600">+150 000 CFA</td>
                            </tr>
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">14/07/2025 11:20</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminé</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Retrait</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-red-600">-50 000 CFA</td>
                            </tr>
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">13/07/2025 09:00</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminé</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Paiement Facture</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-blue-600">-25 000 CFA</td>
                            </tr>
                            <tr class="hover:bg-orange-50 transition-colors duration-200 ease-in-out">
                                <td class="px-5 py-4 text-gray-800">12/07/2025 18:00</td>
                                <td class="px-5 py-4 text-gray-700">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminé</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">Frais Bancaires</span>
                                </td>
                                <td class="px-5 py-4 font-semibold text-red-600">-5 000 CFA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-8 text-center">
                    <button class="bg-orange-primary hover:bg-orange-light text-white px-8 py-3 rounded-full text-base font-medium transition-all duration-300 ease-in-out shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <i class="fas fa-history mr-2"></i> Voir toutes les transactions
                    </button>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gestion du formulaire de dépôt (if it were present on this page)
        document.getElementById('depositForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const account = document.getElementById('account').value;
            const amount = document.getElementById('amount').value;
            
            if (!account || !amount) {
                alert('Veuillez remplir tous les champs');
                return;
            }
            
            // Here, you'd add the logic to send the deposit request to the server
            console.log(`Dépôt de ${amount} CFA sur le compte ${account}`);
            
            // Simulation of success
            alert(`Dépôt de ${amount} CFA effectué avec succès sur votre compte ${account === 'En-cour' ? 'principal' : 'secondaire'}`);
            this.reset();
        });
    </script>
</body>
</html>