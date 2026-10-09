const fs = require('fs');
const path = require('path');

const dir = 'C:/Users/ASUS/OneDrive/Documents/Website-BNN-Kota-Banjarmasin/resources/views/layouts/organisasi/informasi-profil';
const files = [
    'visi-dan-misi.blade.php',
    'tugas-dan-fungsi.blade.php',
    'struktur.blade.php',
    'alamat-kantor.blade.php',
    'lhkpn/lhkpn.blade.php'
];

files.forEach(f => {
    let content = fs.readFileSync(path.join(dir, f), 'utf8');
    // Remove @extends, @section('title'), @section('content'), @endsection
    content = content.replace(/@extends\('layouts\.master'\)/g, '');
    content = content.replace(/@section\('title',.*?\)/g, '');
    content = content.replace(/@section\('content'\)/g, '');
    content = content.replace(/@endsection/g, '');
    
    // Remove the wrapper and navbar
    content = content.replace(/<div class="container mt-5 mb-5" style="padding-top: 15px;">/g, '');
    content = content.replace(/@include\('layouts\.main\.navigation-bar\.main-informasi-profil'\)/g, '');
    
    // Also remove the closing </div> for the wrapper (usually the last </div> before @endsection)
    content = content.replace(/<\/div>\s*$/g, '');

    fs.writeFileSync(path.join(dir, f.replace('.blade.php', '-partial.blade.php')), content.trim());
});
console.log('Partials created.');
