#include <iostream>
#include <string>
#include <iomanip>
#include <vector>
#include <map>
#include <limits>
#include <algorithm>
#include <queue>

using namespace std;

struct Product
{
    string name;
    double price;
    int stock;
    Product *next;

    Product(string n, double p, int s) : name(n), price(p), stock(s), next(nullptr) {}
};

class ProductList
{
public:
    ProductList() : head(nullptr) {}
    int countProducts() const;

    // Algoritma Shell sort untuk mengurutkan produk secara ascending berdasarkan stok
    void shellSortAscendingByStock()
    {
        int n = countProducts();

        // Mulai dengan selisih besar dan kurangi seiring waktu
        for (int gap = n / 2; gap > 0; gap /= 2)
        {
            // Lakukan pengurutan penyisipan untuk setiap selisih
            for (int i = gap; i < n; i++)
            {

                // Traverse daftar dengan selisih saat ini
                Product *temp = head;
                for (int j = i; j >= gap; j -= gap)
                {

                    // Temukan produk saat ini dan sebelumnya untuk dibandingkan
                    Product *current = head;
                    for (int k = 0; k < j; k++)
                    {
                        current = current->next;
                    }

                    Product *prev = head;
                    for (int k = 0; k < j - gap; k++)
                    {
                        prev = prev->next;
                    }

                    // Bandingkan dan tukar jika perlu
                    if (current->stock < prev->stock)
                    {
                        // Swap products/Tukar produk
                        swapProducts(current, prev);
                    }
                }
            }
        }
    }

    // Algoritma Shell sort untuk mengurutkan produk secara descending berdasarkan stok
    void shellSortDescendingByStock()
    {
        int n = countProducts();

        // Mulai dengan selisih besar dan kurangi seiring waktu
        for (int gap = n / 2; gap > 0; gap /= 2)
        {

            // Lakukan pengurutan penyisipan untuk setiap selisih
            for (int i = gap; i < n; i++)
            {

                // Traverse daftar dengan selisih saat ini
                Product *temp = head;
                for (int j = i; j >= gap; j -= gap)
                {

                    // Temukan produk saat ini dan sebelumnya untuk dibandingkan
                    Product *current = head;
                    for (int k = 0; k < j; k++)
                    {
                        current = current->next;
                    }

                    Product *prev = head;
                    for (int k = 0; k < j - gap; k++)
                    {
                        prev = prev->next;
                    }

                    // Bandingkan dan tukar jika perlu
                    if (current->stock > prev->stock)
                    {
                        // Swap products/Tukar produk
                        swapProducts(current, prev);
                    }
                }
            }
        }
    }

    // Fungsi untuk menukar posisi dua produk dalam daftar
    void swapProducts(Product *a, Product *b)
    {
        // Simpan nilai sementara produk A
        string tempName = a->name;
        double tempPrice = a->price;
        int tempStock = a->stock;

        // Salin nilai dari produk B ke produk A
        a->name = b->name;
        a->price = b->price;
        a->stock = b->stock;

        // Salin nilai sementara dari produk A ke produk B
        b->name = tempName;
        b->price = tempPrice;
        b->stock = tempStock;
    }

    // Fungsi untuk membuat produk baru dan menambahkannya ke dalam daftar
    void createProduct(string name, double price, int stock)
    {
        // Buat objek produk baru
        Product *newProduct = new Product(name, price, stock);

        // Jika daftar kosong, jadikan produk baru sebagai kepala
        if (!head)
        {
            head = newProduct;
        }
        else
        {
            // Jika tidak, cari posisi terakhir dalam daftar dan tambahkan produk baru
            Product *current = head;
            while (current->next)
            {
                current = current->next;
            }
            current->next = newProduct;
        }
    }

    // Fungsi untuk menampilkan informasi produk pada layar
    void readProducts()
    {
        system("cls"); // Menghapus layar (hanya berfungsi pada terminal atau command prompt)
        cout << "==================================================================================\n";
        cout << left << setw(30) << "Nama Produk" << setw(20) << "Harga" << setw(20) << "Stok" << endl;
        cout << "==================================================================================\n";
        Product *current = head;
        while (current)
        {
            cout << "----------------------------------------------------------------------------------\n";
            cout << left << setw(30) << current->name << setw(20) << current->price << setw(20) << current->stock << endl;
            current = current->next;
        }
        cout << "==================================================================================\n";
    }

    // Fungsi untuk memperbarui informasi produk berdasarkan nama
    void updateProduct(string name, double price, int stock)
    {
        Product *current = head;
        while (current)
        {
            // Update harga dan stok produk
            if (current->name == name)
            {
                current->price = price;
                current->stock = stock;
                cout << "Produk berhasil diperbarui." << endl;
                return;
            }
            current = current->next;
        }
        cout << "Produk tidak ditemukan." << endl;
    }

    // Fungsi untuk menghapus produk berdasarkan nama
    void deleteProduct(string name)
    {
        // Jika kepala tidak kosong dan nama produk pada kepala sesuai dengan yang dicari
        if (head && head->name == name)
        {
            Product *temp = head;
            head = head->next;
            delete temp;
            cout << "Produk berhasil dihapus." << endl;
            return;
        }

        // Traverse daftar untuk mencari produk dengan nama yang sesuai
        Product *current = head;
        while (current && current->next)
        {
            if (current->next->name == name)
            {
                Product *temp = current->next;
                current->next = current->next->next;
                delete temp;
                cout << "Produk berhasil dihapus." << endl;
                return;
            }
            current = current->next;
        }

        // Jika produk tidak ditemukan
        cout << "Produk tidak ditemukan." << endl;
    }

    // Fungsi untuk mendapatkan kepala dari daftar produk
    Product *getHead() const
    {
        return head;
    }

    // Destruktor untuk menghapus semua produk pada daftar
    ~ProductList()
    {
        while (head)
        {
            Product *temp = head;
            head = head->next;
            delete temp;
        }
    }

private:
    Product *head;
};

// Struktur untuk informasi registrasi pengguna
struct UserRegistration
{
    string username;
    string password;
    bool approved;

    UserRegistration(string uname, string pwd) : username(uname), password(pwd), approved(false) {}
};

// Fungsi untuk menghitung jumlah produk dalam daftar
int ProductList::countProducts() const
{
    int count = 0;
    Product *current = head;
    while (current)
    {
        count++;
        current = current->next;
    }
    return count;
}

// Kelas untuk merepresentasikan pengguna
class User
{
public:
    // Konstruktor untuk inisialisasi username, password, dan peran (role) pengguna
    User(string username, string password, string role) : username(username), password(password), role(role) {}

    // Fungsi untuk mendapatkan username pengguna
    string getUsername() const
    {
        return username;
    }

    // Fungsi untuk mendapatkan password pengguna
    string getPassword() const
    {
        return password;
    }

    // Fungsi untuk mendapatkan peran (role) pengguna
    string getRole() const
    {
        return role;
    }

private:
    string username;
    string password;
    string role;
};

// Fungsi untuk memeriksa apakah pengguna memiliki peran admin
bool isAdmin(const string &username, const string &password, const vector<User> &users)
{
    for (const User &user : users)
    {
        if (user.getUsername() == username && user.getPassword() == password && user.getRole() == "admin")
        {
            return true;
        }
    }
    return false;
}

// Fungsi untuk memeriksa apakah pengguna memiliki peran pembeli
bool isPembeli(const string &username, const string &password, const vector<User> &users)
{
    for (const User &user : users)
    {
        if (user.getUsername() == username && user.getPassword() == password && user.getRole() == "pembeli")
        {
            return true;
        }
    }
    return false;
}

// Kelas untuk mewakili antrian registrasi pengguna
class RegistrationQueue
{
public:
    // Menambahkan registrasi ke dalam antrian
    void push(const UserRegistration &registration)
    {
        registrations.push(registration);
    }

    // Memeriksa apakah antrian registrasi kosong
    bool empty() const
    {
        return registrations.empty();
    }

    // Mendapatkan registrasi yang berada di depan antrian
    UserRegistration front() const
    {
        return registrations.front();
    }

    // Menghapus registrasi yang berada di depan antrian
    void pop()
    {
        registrations.pop();
    }

    // Menampilkan isi dari antrian registrasi
    void displayQueue() const
    {
        // Jika antrian kosong, tampilkan pesan
        if (registrations.empty())
        {
            cout << "Antrian registrasi kosong." << endl;
            return;
        }

        // Jika tidak, tampilkan informasi registrasi satu per satu
        cout << "Isi antrian registrasi:\n";
        RegistrationQueue tempQueue = *this; // Buat salinan antrian
        while (!tempQueue.empty())
        {
            UserRegistration registration = tempQueue.front();
            cout << "Username: " << registration.username << ", Password: " << registration.password << endl;
            tempQueue.pop();
        }
    }

private:
    queue<UserRegistration> registrations;
};

int main()
{
    int loginChoice;
    int maxAttempts = 3;
    int attempts = 0;

    ProductList productList;
    vector<User> users = {
        User("admin", "123", "admin"),

    };
    string username, password;
    string role;
    vector<UserRegistration> registrationRequests;
    RegistrationQueue registrationQueue;

    while (true)
    {
        int loginAttempts;

        do
        {
            system("cls");
            cout << "================ Selamat datang di Toko Hair! ================\n";
            cout << "| 1. Registrasi                                              |\n";
            cout << "|------------------------------------------------------------|\n";
            cout << "| 2. Login sebagai Admin                                     |\n";
            cout << "|------------------------------------------------------------|\n";
            cout << "| 3. Login sebagai Pembeli                                   |\n";
            cout << "|------------------------------------------------------------|\n";
            cout << "| 4. Keluar                                                  |\n";
            cout << "|------------------------------------------------------------|\n";
            cout << "| Pilih peran Anda:                                          |\n";
            cout << "==============================================================\n";

            cout << "Pilih peran Anda: ";

            while (attempts < maxAttempts)
            {
                if (!(cin >> loginChoice) || loginChoice < 1 || loginChoice > 4)
                {
                    cout << "Input tidak valid. Harap masukkan nomor peran yang sesuai.\n";
                    cin.clear();
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    cout << "Pilih peran Anda: ";
                    attempts++;
                }
                else
                {
                    break;
                }
            }
            if (attempts == maxAttempts)
            {
                cout << "Anda telah melebihi batas kesalahan. Program keluar.\n";
                return 0;
            }
            if (loginChoice == 4)
            {
                cout << "Terima kasih telah mengunjungi Toko Hair. Sampai jumpa!\n";
                return 0;
            }

            if (loginChoice == 1)
            {

                string newUsername, newPassword;
                cout << "Masukkan username baru: ";
                cin >> newUsername;
                cout << "Masukkan password baru: ";
                cin >> newPassword;

                bool duplicateUsername = false;

                // Cek apakah username sudah ada dalam antrian registrasi
                for (const UserRegistration &registration : registrationRequests)
                {
                    if (registration.username == newUsername)
                    {
                        duplicateUsername = true;
                        break;
                    }

                    // Cek apakah username sudah ada dalam antrian yang sedang diproses
                    RegistrationQueue tempQueue = registrationQueue;

                    while (!tempQueue.empty())
                    {
                        if (tempQueue.front().username == newUsername)
                        {
                            duplicateUsername = true;
                            break;
                        }
                        tempQueue.pop();
                    }
                }

                if (!duplicateUsername)
                {
                    registrationRequests.push_back(UserRegistration(newUsername, newPassword));
                    registrationQueue.push(UserRegistration(newUsername, newPassword));
                    cout << "Registrasi berhasil. Silakan tunggu persetujuan admin." << endl;

                    // Tampilkan antrian registrasi setelah registrasi
                    registrationQueue.displayQueue();

                    cout << "Ketik 'ya' Untuk Kembali : ";
                    string backToMainMenu;
                    cin >> backToMainMenu;

                    if (backToMainMenu == "ya")
                    {
                        break;
                    }
                }
                else
                {
                    cout << "Username sudah ada dalam daftar permintaan registrasi." << endl;
                }
            }

            else if (loginChoice == 2)
            {
                while (attempts < maxAttempts)
                {
                    cout << "Masukkan username: ";
                    cin >> username;
                    cout << "Masukkan password: ";
                    cin >> password;

                    // Cek apakah pengguna adalah admin
                    if (isAdmin(username, password, users))
                    {
                        role = "admin";
                        cout << "Login berhasil sebagai admin." << endl;
                        break;
                    }
                    else
                    {
                        cout << "Login gagal. Username, password, atau role tidak valid." << endl;
                        attempts++;

                        if (attempts == maxAttempts)
                        {
                            cout << "Anda telah melebihi batas kesalahan. Program keluar.\n";
                            return 0;
                        }
                    }
                }
            }
            else if (loginChoice == 3)
            {
                bool loggedIn = false;
                int loginAttempts = 0;
                const int maxLoginAttempts = 3;

                do
                {
                    cout << "Masukkan username: ";
                    cin >> username;
                    cout << "Masukkan password: ";
                    cin >> password;

                    // Cek apakah pengguna yang belum di-registrasi mencoba login
                    for (const UserRegistration &registration : registrationRequests)
                    {
                        if (registration.username == username && registration.password == password)
                        {
                            if (registration.approved)
                            {
                                loggedIn = true;
                                role = "pembeli";
                                cout << "Login berhasil sebagai pembeli." << endl;
                                break;
                            }
                            else
                            {
                                cout << "Login gagal. Anda belum di registrasi" << endl;
                                break;
                            }
                        }
                    }

                    if (!loggedIn)
                    {
                        loginAttempts++;

                        if (loginAttempts >= maxLoginAttempts)
                        {
                            cout << "Anda telah melebihi batas percobaan login. Program akan keluar." << endl;
                            break;
                        }

                        cout << "Inputan Anda Tidak Valid. Silakan coba lagi." << endl;
                    }
                } while (!loggedIn);
            }

            else if (loginChoice == 4)
            {
                cout << "Terima kasih! Keluar dari aplikasi." << endl;
                break;
            }
            else
            {
                cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
            }

            while (true)
            {
                if (role == "admin")
                {
                    // Menu admin
                    int adminChoice;
                    cout << "===================== Mode Admin ==================\n";
                    cout << "| 1. Tambah Produk                                |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 2. Tampilkan Daftar Produk                      |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 3. Update Produk                                |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 4. Hapus Produk                                 |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 5. Sorting                                      |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 6. Searching                                    |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 7. Data Registrasi                              |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 8. Kembali                                      |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 9. Keluar                                       |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| Pilih tindakan:                                 |\n";
                    cout << "===================================================\n";
                    cout << "Pilih: ";

                    while (!(cin >> adminChoice) || adminChoice < 1 || adminChoice > 9)
                    {
                        cout << "Input tidak valid. Harap masukkan nomor tindakan yang sesuai.\n";

                        cin.clear();

                        cin.ignore(numeric_limits<streamsize>::max(), '\n');
                        cout << "Pilih: ";
                    }

                    // Switch statement untuk menangani pilihan admin
                    switch (adminChoice)
                    {
                    case 1:
                    {
                        // Menambahkan produk baru
                        string name;
                        double price;
                        int stock;
                        cout << "Nama Produk: ";
                        cin.ignore();
                        getline(cin, name);
                        cout << "Harga Produk: ";
                        cin >> price;
                        cout << "Stok Produk: ";
                        cin >> stock;
                        productList.createProduct(name, price, stock);
                        break;
                    }
                    case 2:
                    {
                        // Menampilkan daftar produk
                        productList.readProducts();
                        break;
                    }
                    case 3:
                    {
                        // Memperbarui informasi produk
                        string name;
                        double price;
                        int stock;
                        cout << "Nama Produk yang ingin diperbarui: ";
                        cin.ignore();
                        getline(cin, name);
                        cout << "Harga Produk baru: ";
                        cin >> price;
                        cout << "Stok Produk baru: ";
                        cin >> stock;
                        productList.updateProduct(name, price, stock);
                        break;
                    }
                    case 4:
                    {
                        // Menghapus produk
                        string name;
                        cout << "Nama Produk yang ingin dihapus: ";
                        cin.ignore();
                        getline(cin, name);
                        productList.deleteProduct(name);
                        break;
                    }
                    case 5:
                    {
                        // Melakukan sorting pada produk
                        int sortingChoice;
                        cout << "=========================================\n";
                        cout << "| Pilih tipe sorting:                   |\n";
                        cout << "|---------------------------------------|\n";
                        cout << "| 1. Ascending berdasarkan harga produk  |\n";
                        cout << "|---------------------------------------|\n";
                        cout << "| 2. Descending berdasarkan stok produk |\n";
                        cout << "|---------------------------------------|\n";
                        cout << "Pilihan: ";
                        cin >> sortingChoice;

                        switch (sortingChoice)
                        {
                        case 1:
                        {

                            // Sorting ascending berdasarkan harga produk
                            productList.shellSortAscendingByStock();
                            cout << "Daftar produk telah diurutkan secara ascending berdasarkan nama produk." << endl;
                            break;
                        }
                        case 2:
                        {
                            // Sorting descending berdasarkan stok produk
                            productList.shellSortDescendingByStock();
                            cout << "Daftar produk telah diurutkan secara descending berdasarkan stok produk." << endl;
                            break;
                        }
                        default:
                        {
                            cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
                            break;
                        }
                        }
                        break;
                    }
                    case 6:
                    {
                        {
                            // Melakukan pencarian pada produk
                            string searchName;
                            cout << "Masukkan nama produk yang ingin Anda cari: ";
                            cin.ignore();
                            getline(cin, searchName);

                            Product *current = productList.getHead();
                            bool found = false;
                            cout << "==================================================================================\n";
                            cout << left << setw(30) << "Nama Produk" << setw(20) << "Harga" << setw(20) << "Stok" << endl;
                            cout << "==================================================================================\n";

                            while (current)
                            {
                                if (current->name.find(searchName) != string::npos)
                                {
                                    found = true;
                                    cout << "----------------------------------------------------------------------------------\n";
                                    cout << left << setw(30) << current->name << setw(20) << current->price << setw(20) << current->stock << endl;
                                }
                                current = current->next;
                            }

                            if (!found)
                            {
                                cout << "Produk tidak ditemukan." << endl;
                            }
                            cout << "==================================================================================\n";
                            break;
                        };
                    }
                    case 7:
                    {
                        // Menampilkan data registrasi
                        cout << "================= Data Registrasi ====================\n";
                        cout << "| Nama Pengguna | Password | Status Persetujuan      |\n";
                        cout << "------------------------------------------------------\n";
                        for (const UserRegistration &registration : registrationRequests)
                        {
                            cout << "| " << setw(14) << registration.username << " | " << setw(8) << registration.password << " | " << setw(17);
                            if (registration.approved)
                            {
                                cout << "Disetujui          |\n";
                            }

                            else
                            {
                                cout << "Menunggu Persetujuan|\n";
                            }
                        }
                        cout << "----------------------------------------------------\n";

                        cout << "Apakah Anda ingin menyetujui registrasi? (ya/tidak): ";
                        string approveRegistration;
                        cin >> approveRegistration;

                        string approveUsername;
                        if (approveRegistration == "ya")
                        {
                            cout << "Masukkan nama pengguna yang ingin disetujui: ";
                            cin >> approveUsername;

                            bool found = false;
                            for (UserRegistration &registration : registrationRequests)
                            {
                                if (registration.username == approveUsername)
                                {
                                    registration.approved = true;
                                    cout << "Registrasi berhasil disetujui." << endl;
                                    found = true;
                                    break;
                                }
                            }

                            if (!found)
                            {
                                cout << "Nama pengguna tidak ditemukan. Registrasi tidak dapat disetujui." << endl;
                            }
                        }
                        else
                        {
                            cout << "Registrasi tidak disetujui." << endl;

                            for (UserRegistration &registration : registrationRequests)
                            {
                                if (registration.username == approveUsername)
                                {
                                    registration.approved = false;
                                    break;
                                }
                            }
                        }

                        cout << "Apakah Anda ingin kembali ke menu admin? (ya/tidak): ";
                        string backToAdminMenu;
                        cin >> backToAdminMenu;

                        if (backToAdminMenu == "ya")
                        {
                            break;
                        }
                    }

                    case 8:
                    {
                        // Kembali ke menu utama
                        cout << "Anda akan kembali ke pemilihan peran." << endl;
                        role = "";
                        break;
                    }
                    case 9:
                    {
                        // Keluar dari program
                        cout << "Terima kasih! Keluar dari aplikasi." << endl;
                        return 0;
                    }
                    default:
                    {
                        // Pilihan tidak valid
                        cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
                        break;
                    }
                    }

                    if (role.empty())
                    {
                        break;
                    }
                }
                else if (role == "pembeli")
                {
                    // Menu pembeli
                    int pembeliChoice;
                    map<string, int> cart;

                    cout << "===================== Mode Pembeli ==================\n";
                    cout << "| 1. Beli Produk                                  |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 2. Lihat Menu                                   |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 3. Kembali                                      |\n";
                    cout << "|------------------------------------------------ |\n";
                    cout << "| 4. Keluar                                       |\n";
                    cout << "===================================================\n";
                    cout << "Pilih: ";

                    while (!(cin >> pembeliChoice) || pembeliChoice < 1 || pembeliChoice > 4)
                    {
                        cout << "Input tidak valid. Harap masukkan nomor tindakan yang sesuai.\n";

                        cin.clear();

                        cin.ignore(numeric_limits<streamsize>::max(), '\n');

                        cout << "Pilih: ";
                    }

                    double productTotal = 0.0;
                    switch (pembeliChoice)
                    {

                    case 1:
                    {
                        string name;
                        int quantity;
                        bool purchased = false;
                        double totalCost = 0;

                        cout << "=== Pembelian Produk ===" << endl;

                        while (true)
                        {
                            cout << "Nama Produk yang ingin dibeli, ketik 'selesai' jika sudah : ";
                            cin.ignore();
                            getline(cin, name);

                            if (name == "selesai")
                            {
                                if (purchased)
                                {
                                    double payment;
                                    cout << "Masukkan nominal pembayaran: Rp ";
                                    cin >> payment;

                                    cout << "=============================== Struk Pembelian ==============================\n";
                                    cout << "|    Barang yang dibeli     |  Jumlah |   Harga Satuan  |    Total Harga     |\n";
                                    cout << "------------------------------------------------------------------------------\n";

                                    for (const auto &item : cart)
                                    {
                                        for (Product *current = productList.getHead(); current != nullptr; current = current->next)
                                        {
                                            if (current->name == item.first)
                                            {
                                                double productCost = current->price * item.second;
                                                cout << "| " << left << setw(25) << item.first << " | " << setw(7) << item.second << " | Rp " << setw(13) << current->price << " | Rp " << fixed << setprecision(0) << setw(12) << productCost << " |\n";
                                                productTotal += productCost;
                                                break;
                                            }
                                        }
                                    }

                                    cout << "------------------------------------------------------------------------------\n";
                                    cout << "|             Total Harga             |             Rp " << setw(20) << fixed << setprecision(0) << productTotal << " |\n";
                                    cout << "|             Pembayaran              |             Rp " << setw(20) << fixed << setprecision(0) << payment << " |\n";
                                    cout << "|             Kembalian               |             Rp " << setw(20) << fixed << setprecision(0) << (payment - productTotal) << " |\n";
                                    cout << "==============================================================================\n";
                                    while (true)
                                    {
                                        std::cout << "Ingin melanjutkan pembelian? (kembali): ";
                                        std::string continuePurchase;
                                        std::cin >> continuePurchase;

                                        if (continuePurchase == "kembali")
                                        {
                                            std::cout << "Anda telah kembali." << std::endl;
                                            break;
                                        }
                                        else
                                        {
                                            std::cout << "Masukkan pilihan yang valid (kembali)." << std::endl;
                                        }
                                    }
                                }
                                break;
                            }
                            else if (name == "lihat")
                            {
                                // Menampilkan daftar produk saat proses pembelian
                                productList.readProducts();
                                continue;
                            }

                            while (true)
                            {
                                cout << "Jumlah yang ingin dibeli: ";
                                if (cin >> quantity && quantity > 0)
                                {
                                    break;
                                }
                                else
                                {
                                    cout << "Inputan Tidak Valid. Silahkan Coba Lagi" << endl;
                                    cin.clear();
                                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                                }
                            }

                            // Mencari produk berdasarkan nama
                            for (Product *current = productList.getHead(); current != nullptr; current = current->next)
                            {
                                if (current->name == name && current->stock >= quantity)
                                {
                                    // Menambahkan produk ke keranjang belanja
                                    double productCost = current->price * quantity;
                                    cout << "Anda membeli " << quantity << " " << current->name << " dengan total harga: Rp " << productCost << endl;
                                    current->stock -= quantity;
                                    purchased = true;

                                    if (cart.find(name) != cart.end())
                                    {
                                        cart[name] += quantity;
                                        totalCost += current->price * quantity;

                                        // Menampilkan informasi pembelian
                                        cout << "Produk berhasil ditambahkan ke keranjang belanja." << endl;
                                        cout << "Total Harga Sementara: Rp " << fixed << setprecision(0) << totalCost << endl;
                                        purchased = true;
                                        break;
                                    }
                                    else
                                    {
                                        cart[name] = quantity;
                                    }
                                    totalCost += productCost;
                                    break;
                                }
                            }

                            // Menampilkan pesan jika produk tidak ditemukan
                            if (!purchased)
                            {
                                cout << "Pembelian gagal. Produk tidak ditemukan atau stok tidak mencukupi." << endl;
                            }
                        }
                    }

                    case 2:
                    {
                        // Menampilkan daftar produk saat proses pembelian
                        productList.readProducts();
                        break;
                    }
                    case 3:
                    {
                        // Kembali ke menu utama pembeli
                        cout << "Anda akan kembali ke pemilihan peran." << endl;
                        role = "";
                        break;
                    }
                    case 4:
                    {
                        // Keluar dari program
                        cout << "Terima kasih! Keluar dari aplikasi." << endl;
                        return 0;
                    }
                    default:
                    {
                        // Pilihan tidak valid
                        cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
                        break;
                    }
                    }
                    if (role.empty())
                    {
                        break;
                    }
                }
            }
        } while (true);
    }

    return 0;
}
