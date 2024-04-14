## Todo App ( level 1) README

This is a simple PHP script for managing todo items using a SQLite database. The script allows users to create new todo items and retrieve all existing todo items.

### Setup Instructions
1. Ensure you have PHP installed on your system.
2. Create a new SQLite database file named `todo_app.db` in the same directory as the script.
3. Run the script using a local server environment.

### Usage
- **Creating a New Todo Item**: Send a POST request to the script with JSON data containing the new todo item's task. Example:
  ```json
  {
    "task": "Complete assignment"
  }
  ```
- **Retrieving All Todo Items**: Send a GET request to the script to retrieve all existing todo items.

### API Endpoints
- **POST /todo.php**: Create a new todo item.
- **GET /todo.php**: Retrieve all todo items.

### Database Schema
The script creates a table named `todos` with the following schema:
- `id` (INTEGER, PRIMARY KEY): Unique identifier for each todo item.
- `task` (TEXT): Description of the todo item.

### Dependencies
- PHP
- SQLite3
- 
### License
This script is released under the MIT License. Feel free to modify and use it according to your needs.

For any questions or issues, please contact [your email or support contact].

Thank you for using the Todo App script! 🚀