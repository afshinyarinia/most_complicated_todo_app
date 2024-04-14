## Todo App (level 3) README

This PHP script provides functionality to manage todo items using a SQLite database. Users can create new todo items and retrieve all existing todo items through API endpoints.

### Summary of Differences - Level 2 vs. Level 3 Refactor

#### Level 2 (Old Version)
- **Approach**: Procedural programming with all functions in a single script.
- **Database Connection**: Directly established within the script.
- **Error Handling**: Basic error handling using try-catch blocks for database operations.
- **Functionality**: Create database connection, create todo item, and retrieve all todo items in the same script.
- **Organization**: All functions and logic in a single file.

#### Level 3 (Refactor - Object-Oriented Approach)
- **Approach**: Object-Oriented Programming (OOP) with classes and separate files.
- **Database Connection**: Encapsulated in a `DatabaseConnection` class for better abstraction.
- **Error Handling**: Improved error handling within class methods for database operations.
- **Functionality**: Todo item creation and retrieval logic encapsulated in a `TodoItem` class.
- **Organization**: Classes and logic separated into different files for improved code organization and maintainability.

The Level 3 refactor introduces a more structured and organized approach by utilizing OOP principles, separating concerns into classes, and improving error handling mechanisms. This refactor enhances code readability, maintainability, and scalability compared to the procedural Level 2 version.
### Setup Instructions
1. Ensure PHP and SQLite3 are installed on your system.
2. Create a SQLite database file named `todo_app.db` in the same directory as the script.
3. Run the script on a local server environment.

### Usage
- **Creating a New Todo Item**: Send a POST request to the script with JSON data containing the new todo item's task. Example:
  ```json
  {
    "task": "Complete assignment"
  }
  ```
- **Retrieving All Todo Items**: Send a GET request to the script to fetch all existing todo items.

### API Endpoints
- **POST /todo.php**: Create a new todo item.
- **GET /todo.php**: Retrieve all todo items.

### Functions
- **createDatabaseConnection()**: Establishes a connection to the SQLite database and creates the `todos` table if it doesn't exist.
- **createTodoItem($db, $task)**: Inserts a new todo item into the database with the provided task.
- **getAllTodoItems($db)**: Retrieves all todo items from the database and returns them as JSON.

### Error Handling
- Errors related to database connection, creating todo items, and fetching todo items are caught and displayed with appropriate error messages.

### License
This script is provided under the MIT License. Feel free to modify and use it according to your requirements.

For any inquiries or support, please contact [your email or support contact].

Thank you for using the Todo App script! 🚀
