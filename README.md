# Guestbook System in PHP

The **Guestbook System in PHP** is a simple and efficient web application that allows visitors to leave their names and messages. All entries are securely stored in a CSV file, making it easy to manage and view guestbook entries without the need for a traditional database. This lightweight application is perfect for personal websites, blogs, or small business sites looking to add a personal touch by welcoming visitors.

## Project Link
[Guestbook System in PHP GitHub Repository](https://github.com/yasinULLAH/Guest-book-system-in-php)

## Features
- **Add Entries**: Visitors can submit their name and message to the guestbook.
- **View Entries**: All guestbook entries are displayed in reverse chronological order.
- **Data Persistence**: Entries are stored in a `guestbook.csv` file, ensuring data is retained even after server restarts.
- **Simple and Clean UI**: User-friendly interface for both submitting and viewing entries.
- **Validation**: Ensures that both name and message fields are filled before submission.
- **Security**: Sanitizes user input to prevent XSS attacks.

## Technologies Used
- **PHP**: Handles form submissions, reads from, and writes to the CSV file.
- **HTML**: Structures the webpage.
- **CSS**: Styles the application for a clean and responsive design.
- **CSV**: Serves as the local database for storing guestbook entries.

## Installation & Usage

To set up and run the **Guestbook System in PHP** locally, follow these steps:

### Prerequisites
- A web server with PHP support (e.g., [XAMPP](https://www.apachefriends.org/index.html), [WAMP](http://www.wampserver.com/), or [MAMP](https://www.mamp.info/en/)).
- Basic knowledge of PHP and web development.

### Steps

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/yasinULLAH/Guest-book-system-in-php.git
    ```

2. **Navigate to the Project Folder:**
    ```bash
    cd Guest-book-system-in-php
    ```

3. **Set Up the CSV File:**
    - Ensure that the `guestbook.csv` file exists in the project directory.
    - If it doesn't exist, create a new file named `guestbook.csv` and ensure it has the appropriate write permissions.
    - On Unix-based systems, you can set the permissions using:
        ```bash
        chmod 666 guestbook.csv
        ```
      This allows the web server to read and write to the file.

4. **Start Your Web Server:**
    - If you're using XAMPP, WAMP, or MAMP, start the Apache server.

5. **Access the Application:**
    - Open your web browser and navigate to:
        ```
        http://localhost/Guest-book-system-in-php/guestbook.php
        ```
      Adjust the URL based on your server configuration and the project folder location.

## How to Use

1. **Submit a Guestbook Entry:**
    - Fill in the **Your Name** field with your name.
    - Enter your message in the **Your Message** textarea.
    - Click the **Sign Guestbook** button to submit your entry.

2. **View Guestbook Entries:**
    - All submitted entries will appear below the submission form.
    - Entries are displayed with the most recent first, showing the name, timestamp, and message.

3. **Data Management:**
    - All entries are stored in the `guestbook.csv` file.
    - To view or manage entries directly, you can open the CSV file using a text editor or spreadsheet application like Excel.

## Contributing

Contributions are welcome! If you'd like to improve the **Guestbook System in PHP**, please follow these steps:

1. **Fork the Repository.**
2. **Create a New Branch:**
    ```bash
    git checkout -b feature/YourFeatureName
    ```
3. **Make Your Changes and Commit Them:**
    ```bash
    git commit -m "Add some feature"
    ```
4. **Push to the Branch:**
    ```bash
    git push origin feature/YourFeatureName
    ```
5. **Open a Pull Request.**

Please ensure your code follows best practices and includes appropriate comments for clarity.

## License

This project is open-source and available under the [MIT License](LICENSE).

---

Happy Guestbooking! 📝✨
