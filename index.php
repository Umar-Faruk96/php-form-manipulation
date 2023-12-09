<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic Course - Class - 08</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flatpickr CDN of CSS and JS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Select2 CDN of CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="bg-gray-200 p-6">
    <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Example Form</h2>

        <!-- DOM Manipulation through PHP -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
            $gender = !empty($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
            $subscribe = !empty($_POST['subscribe']) ? htmlspecialchars($_POST['subscribe']) : '';
            $datepicker = !empty($_POST['datepicker']) ? htmlspecialchars($_POST['datepicker']) : '';
            $timepicker = !empty($_POST['timepicker']) ? htmlspecialchars($_POST['timepicker']) : '';
            $options = isset($_POST['options']) ? $_POST['options'] : [];
            $multicheckbox = isset($_POST['multicheckbox']) ? $_POST['multicheckbox'] : [];
            $country = !empty($_POST['country']) ? htmlspecialchars($_POST['country']) : '';
        ?>

            <div class="mb-4">
                <ul>
                    <li><?php echo "Name : " . $name . "." ?></li>
                    <li><?php echo "Gender : " . $gender . "." ?></li>
                    <li><?php echo "Status : " . $subscribe . "." ?></li>
                    <li><?php echo "The Date is : " . $datepicker . "." ?></li>
                    <li><?php echo "The Time is : " . $timepicker . "." ?></li>
                    <li><?php echo "The Selected Options are : " . implode(", ", $options) . "." ?></li>
                    <li><?php echo "The Selected Checkboxes are : " . implode(", ", $multicheckbox) . "." ?></li>
                    <li><?php echo "The Selected Country is : " .  $country . "." ?></li>
                </ul>
            </div>

        <?php else :
        ?>

            <div class="mb-4">Nothing is selected</div>

        <?php endif ?>

        <form action="#" method="POST">
            <!-- Text Input -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="name" name="name" value="<?php echo $name ?>">
            </div>

            <!-- Radio Input -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Gender</label>
                <div class="mt-1 space-x-4">
                    <label for="male" class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="male" name="gender" value="Male" <?php echo $gender === "Male" ? "checked" : "" ?>>
                        <span class="ml-2">Male</span>
                    </label>
                    <label for="female" class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="female" name="gender" value="Female" <?php echo $gender === "Female" ? "checked" : "" ?>>
                        <span class="ml-2">Female</span>
                    </label>
                </div>
            </div>

            <!-- Checkbox -->
            <div class="mb-4">
                <label for="subscribe" class="block text-sm font-medium text-gray-600">Subscribe</label>
                <input type="checkbox" class="form-checkbox text-indigo-600" id="subscribe" name="subscribe" value="Subscribed" <?php echo $subscribe === "Subscribed" ? "checked" : "" ?>>
            </div>

            <!-- Date Picker -->
            <div class="mb-4">
                <label for="datepicker" class="block text-sm font-medium text-gray-600">Pick a Date</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="datepicker" name="datepicker" value="<?php echo $datepicker ?>">
            </div>

            <!-- Time Picker -->
            <div class="mb-4">
                <label for="timepicker" class="block text-sm font-medium text-gray-600">Pick a Time</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="timepicker" name="timepicker" value="<?php echo $timepicker ?>">
            </div>

            <!-- Multiselect Dropdown using Select2 -->
            <div class="mb-4">
                <label for="options" class="block text-sm font-medium text-gray-600">Select Options</label>
                <select name="options[]" id="options" class="mt-1 p-2 w-full border rounded-md" multiple>
                    <option <?php
                            echo in_array("Option 1", $options ?? []) ? "selected" : ''
                            ?> value="Option 1">Option 1</option>
                    <option <?php
                            echo in_array("Option 2", $options ?? []) ? "selected" : ''
                            ?> value="Option 2">Option 2</option>
                    <option <?php
                            echo in_array("Option 3", $options ?? []) ? "selected" : ''
                            ?> value="Option 3">Option 3</option>
                    <option <?php
                            echo in_array("Option 4", $options ?? []) ? "selected" : ''
                            ?> value="Option 4">Option 4</option>
                    <option <?php
                            echo in_array("Option 5", $options ?? []) ? "selected" : ''
                            ?> value="Option 5">Option 5</option>
                    <option <?php
                            echo in_array("Option 6", $options ?? []) ? "selected" : ''
                            ?> value="Option 6">Option 6</option>
                </select>
            </div>

            <!-- Multi-checkbox -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Select Multiple Options</label>
                <div class="space-y-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="multicheckbox[]" value="Checkbox 1" class="form-checkbox text-indigo-600" <?php echo in_array("Checkbox 1", $multicheckbox ?? []) ? "checked" : "" ?>>
                        <span class="ml-2">Checkbox 1</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="multicheckbox[]" value="Checkbox 2" class="form-checkbox text-indigo-600" <?php echo in_array("Checkbox 2", $multicheckbox ?? []) ? "checked" : "" ?>>
                        <span class="ml-2">Checkbox 2</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="multicheckbox[]" value="Checkbox 3" class="form-checkbox text-indigo-600" <?php echo in_array("Checkbox 3", $multicheckbox ?? []) ? "checked" : "" ?>>
                        <span class="ml-2">Checkbox 3</span>
                    </label>
                </div>
            </div>

            <!-- Select Dropdown -->
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-600">Country</label>
                <select name="country" id="country" class="mt-1 p-2 w-full border rounded-md">
                    <option value="United States" default <?php echo $country === "United States" ? "selected" : "" ?>>United States</option>
                    <option value="Canada" <?php echo $country === "Canada" ? "selected" : "" ?>>Canada</option>
                    <option value="United Kingdom" <?php echo $country === "United Kingdom" ? "selected" : "" ?>>United Kingdom</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white p-2 rounded-md">Submit</button>
            </div>

        </form>
    </div>

    <script>
        // Date Picker Script
        flatpickr("#datepicker", {
            enableTime: true,
            dateFormat: "d : m : Y",
        });

        // Time Picker Script
        flatpickr("#timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H : i",
            time_24hr: true
        });

        // Multiple Select Script
        $(document).ready(function() {
            $('#options').select2();
        });
    </script>
</body>

</html>