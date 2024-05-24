<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus Block</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f4f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 100%;
            text-align: center;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            color: #333;
        }

        .task-controls {
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-controls input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .task-controls button {
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .task-controls button:hover {
            background: #0056b3;
        }

        .task-list, .weekly-tasks {
            margin-top: 20px;
        }

        .task-item, .weekly-task {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-item button, .weekly-task button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            position: relative;
        }

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .calendar {
            margin-top: 20px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-body {
            margin-top: 10px;
        }

        .calendar-weekdays, .calendar-dates {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-weekdays div, .calendar-dates div {
            padding: 10px;
            text-align: center;
        }

        .calendar-weekdays {
            background: #007BFF;
            color: white;
            border-radius: 5px;
        }

        .calendar-dates div {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .calendar-dates div:hover {
            background: #f0f0f0;
        }

        .calendar-dates .selected {
            background: #007BFF;
            color: white;
        }

        .day-tasks {
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .task-detail {
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-detail button {
            color: #007BFF;
            border: none;
            background: none;
            cursor: pointer;
        }

        .task-detail button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Focus Block - Weekly Planner</h1>
        <div class="calendar">
            <div class="calendar-header">
                <button id="prev-month">Previous</button>
                <h2 id="month-year"></h2>
                <button id="next-month">Next</button>
            </div>
            <div class="calendar-body">
                <div class="calendar-weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div id="calendar-dates" class="calendar-dates"></div>
            </div>
        </div>
        <div class="task-controls">
            <input type="text" id="search" placeholder="Search tasks">
            <button id="add-task">Add Task</button>
			<button id="delete-task">Delete Task</button>
        </div>
        <div id="task-list" class="task-list"></div>
        <h2>Weekly Tasks</h2>
        <div id="weekly-tasks" class="weekly-tasks">
			<div id="sunday-tasks-list" class="day-tasks"></div>
			<div id="monday-tasks-list" class="day-tasks"></div>
			<div id="tuesday-tasks-list" class="day-tasks"></div>
			<div id="wednesday-tasks-list" class="day-tasks"></div>
			<div id="thursday-tasks-list" class="day-tasks"></div>
			<div id="friday-tasks-list" class="day-tasks"></div>
			<div id="saturday-tasks-list" class="day-tasks"></div>
        </div>
    </div>

    <!-- Task Modal -->
    <div id="task-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="task-form">
                <input type="hidden" id="task-id">
                <label for="task-title">Title</label>
                <input type="text" id="task-title" required>
                <label for="task-date">Date</label>
                <input type="date" id="task-date" required>
                <label for="task-details">Details</label>
                <textarea id="task-details" rows="4"></textarea>
                <button type="submit">Save Task</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const taskModal = document.getElementById('task-modal');
            const closeModal = document.getElementsByClassName('close')[0];
            const addTaskButton = document.getElementById('add-task');
            const taskForm = document.getElementById('task-form');
            const taskList = document.getElementById('task-list');
            const searchInput = document.getElementById('search');
            const weeklyTasks = {
                '0': document.getElementById('sunday-tasks-list'),
                '1': document.getElementById('monday-tasks-list'),
                '2': document.getElementById('tuesday-tasks-list'),
                '3': document.getElementById('wednesday-tasks-list'),
                '4': document.getElementById('thursday-tasks-list'),
                '5': document.getElementById('friday-tasks-list'),
                '6': document.getElementById('saturday-tasks-list')
            };

            let tasks = JSON.parse(localStorage.getItem('tasks')) || [];

            addTaskButton.onclick = () => {
                taskModal.style.display = 'flex';
                document.getElementById('task-id').value = '';
                taskForm.reset();
            };

            closeModal.onclick = () => {
                taskModal.style.display = 'none';
            };

            window.onclick = (event) => {
                if (event.target === taskModal) {
                    taskModal.style.display = 'none';
                }
            };

            taskForm.onsubmit = (event) => {
                event.preventDefault();
                const taskId = document.getElementById('task-id').value;
                const taskTitle = document.getElementById('task-title').value;
                const taskDate = document.getElementById('task-date').value;
                const taskDetails = document.getElementById('task-details').value;

                if (taskId) {
                    tasks = tasks.map(task => task.id === taskId ? { id: taskId, title: taskTitle, date: taskDate, details: taskDetails } : task);
                } else {
                    const id = Date.now().toString();
                    tasks.push({ id, title: taskTitle, date: taskDate, details: taskDetails });
                }

                localStorage.setItem('tasks', JSON.stringify(tasks));
                renderTasks();
                renderWeeklyTasks();
                taskModal.style.display = 'none';
            };

            searchInput.oninput = () => {
                renderTasks();
                renderWeeklyTasks();
            };

            function renderTasks() {
                taskList.innerHTML = '';
                const searchTerm = searchInput.value.toLowerCase();
                const filteredTasks = tasks.filter(task => task.title.toLowerCase().includes(searchTerm) || task.details.toLowerCase().includes(searchTerm));
                filteredTasks.forEach(task => {
                    const taskItem = document.createElement('div');
                    taskItem.className = 'task-item';
                    taskItem.innerHTML = `
                        <div>
                            <strong>${task.title}</strong>
                            <p>${task.date}</p>
                            <p>${task.details}</p>
                        </div>
                        <div>
                            <button onclick="editTask('${task.id}')">Edit</button>
                            <button onclick="deleteTask('${task.id}')">Delete</button>
                        </div>
                    `;
                    taskList.appendChild(taskItem);
                });
            }

	

			function renderWeeklyTasks() {
				Object.keys(weeklyTasks).forEach(key => {
					weeklyTasks[key].innerHTML = '';
					const dayTasks = tasks.filter(task => new Date(task.date).getDay() === parseInt(key));
					dayTasks.forEach(task => {
						const taskDetail = document.createElement('div');
						taskDetail.className = 'task-detail';
						taskDetail.innerHTML = `
							<p><strong>${task.title}</strong> - ${task.details}</p>
						`;
						const deleteButton = document.createElement('button');
						deleteButton.textContent = 'Delete';
						deleteButton.onclick = () => deleteTask(task.id);
						taskDetail.appendChild(deleteButton);
						weeklyTasks[key].appendChild(taskDetail);
					});
				});
			}


            window.editTask = (id) => {
                const task = tasks.find(task => task.id === id);
                document.getElementById('task-id').value = task.id;
                document.getElementById('task-title').value = task.title;
                document.getElementById('task-date').value = task.date;
                document.getElementById('task-details').value = task.details;
                taskModal.style.display = 'flex';
            };

            window.deleteTask = (id) => {
                tasks = tasks.filter(task => task.id !== id);
                localStorage.setItem('tasks', JSON.stringify(tasks));
                renderTasks();
                renderWeeklyTasks();
            };

            renderTasks();
            renderWeeklyTasks();
        });
    </script>
</body>
</html>
