let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let search = document.querySelector('.input-group input');
let table_rows = document.querySelectorAll('tbody tr');
let logout = document.querySelector("#log_out");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();
});

search.addEventListener('input', searchTable);

function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}

function searchTable() {
    const searchTerm = search.value.toLowerCase();
    table_rows.forEach((row) => {
        const rowData = row.textContent.toLowerCase();
        row.classList.toggle('hide', !rowData.includes(searchTerm));
    });
}

// Función para descargar archivos
const downloadFile = function(data, fileType, fileName = 'export') {
    const a = document.createElement('a');
    a.download = `${fileName}.${fileType}`;
    const mime_types = {
        'json': 'application/json',
        'csv': 'text/csv',
        'excel': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    };

    if (fileType in mime_types) {
        const blob = new Blob([data], { type: mime_types[fileType] });
        const url = URL.createObjectURL(blob);
        a.href = url;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    } else {
        console.error('Unsupported file type');
    }
};

// Funciones de exportación
const pdf_btn = document.querySelector('#toPDF');
const customers_table = document.querySelector('#customers_table');

const toPDF = function (table) {
    const rows = table.querySelectorAll('tr');
    const tableHTML = [...rows].map(row => {
        const cells = row.querySelectorAll('th, td');
        return `<tr>${[...cells].map(cell => `<td>${cell.textContent.trim()}</td>`).join('')}</tr>`;
    }).join('');

    const html_code = `
    <!DOCTYPE html>
    <html>
    <head>
        <title>Table Export</title>
        <style>
            table { width: 100%; border-collapse: collapse; }
            td, th { border: 1px solid #ddd; padding: 8px; text-align: left; }
        </style>
    </head>
    <body>
        <table>${tableHTML}</table>
    </body>
    </html>`;

    const new_window = window.open();
    new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
};

pdf_btn.onclick = () => {
    toPDF(customers_table);
};

const json_btn = document.querySelector('#toJSON');
json_btn.onclick = () => {
    const json = toJSON(customers_table);
    downloadFile(json, 'json', 'User_List');
};

const csv_btn = document.querySelector('#toCSV');
csv_btn.onclick = () => {
    const csv = toCSV(customers_table);
    downloadFile(csv, 'csv', 'User_List');
};

const excel_btn = document.querySelector('#toEXCEL');
excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'excel', 'User_List');
};

// Funciones para exportar a JSON, CSV y Excel
const toJSON = function (table) {
    let table_data = [],
        t_head = [],
        t_headings = table.querySelectorAll('th'),
        t_rows = table.querySelectorAll('tbody tr');

    for (let t_heading of t_headings) {
        let actual_head = t_heading.textContent.trim().split(' ');
        t_head.push(actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase());
    }

    t_rows.forEach(row => {
        const row_object = {},
            t_cells = row.querySelectorAll('td');

        t_cells.forEach((t_cell, cell_index) => {
            row_object[t_head[cell_index]] = t_cell.textContent.trim();
        });
        table_data.push(row_object);
    });

    return JSON.stringify(table_data, null, 4);
};

const toCSV = function (table) {
    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => head.textContent.trim()).join(',') + ',';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td');
        return [...cells].map(cell => cell.textContent.replace(/,/g, ".").trim()).join(',');
    }).join('\n');

    return headings + '\n' + table_data;
};

const toExcel = function (table) {
    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => head.textContent.trim()).join('\t') + '\t';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td');
        return [...cells].map(cell => cell.textContent.trim()).join('\t');
    }).join('\n');

    return headings + '\n' + table_data;
};

// 2. Sorting | Ordering data of HTML table
const table_headings = document.querySelectorAll('th.sortable');

table_headings.forEach((head, i) => {
    let sort_asc = true; // Inicialmente, el orden es ascendente
    head.onclick = () => {
        // Remover la clase 'active' de todos los encabezados
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        // Remover la clase 'active' de todas las celdas
        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        
        // Agregar la clase 'active' a las celdas de la columna actual
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        });

        // Alternar el orden (ascendente/descendente)
        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        // Llamar a la función de ordenamiento
        sortTable(i, sort_asc);
    };
});

function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? -1 : 1) : (first_row < second_row ? 1 : -1);
    })
    .forEach(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

logout.addEventListener("click", () => {
    window.location.href = "admin.php";
});

