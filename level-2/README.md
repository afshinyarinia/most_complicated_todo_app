## Todo App (level 2) README

This PHP script provides functionality to manage todo items using a SQLite database. Users can create new todo items and retrieve all existing todo items through API endpoints.

### Differences between the Two Todo Apps

The level 2 , compared to the simpler version, places a stronger emphasis on error handling during data retrieval operations. It provides detailed error messages and robust error handling mechanisms for database operations and data fetching processes. Additionally, the more complex app is  emphasizing the importance of secure data handling practices. Users can benefit from the advanced error handling features implemented in the level 2 todo app, ensuring a more reliable and secure user experience.

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