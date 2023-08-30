# QuickLand

QuickLand is a custom WordPress theme designed for creating single-page landing pages with a modern look and feel. This theme utilizes Laravel Mix for compiling and managing SCSS stylesheets following the 7-1 architecture. This README provides guidance on setting up and using the QuickLand theme.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Theme Features](#theme-features)
- [Usage](#usage)
  - [Compiling SCSS](#compiling-scss)
- [Contributing](#contributing)
- [License](#license)

## Prerequisites

Before getting started with the QuickLand WordPress theme, ensure you have the following:

- A working WordPress installation (locally or on a web server).
- Node.js and npm (Node Package Manager) installed on your development machine.

## Installation

1. Clone this repository into your WordPress themes directory:

```bash
git clone https://github.com/FrancescoCaponero/quickland.git wp-content/themes/quickland
```

2. Navigate to your WordPress dashboard and activate the QuickLand theme.

3. In your terminal, navigate to the theme directory:

```bash
cd wp-content/themes/quickland
```

4. Install the required Node.js packages:

```bash
npm install
```

## Theme Features
Single-page landing page layout.
SCSS 7-1 architecture for organized stylesheet development.
Laravel Mix for compiling SCSS into CSS.
Easy section creation and customization.
Smooth scrolling navigation.

## Usage

### Compiling SCSS

Compile your SCSS into CSS using Laravel Mix. Run the following command:
```bash
npx mix watch
```

### ADDITIONAL CSS CLASS(ES) to add in wp-admin for styling

```bash
.wp-main-wrapper
.wp-main-wrapper-flexcol
.wp-block-main-col
.wp-main-wrapper-col
.md-pd-y
.l-pd-y
.xl-pd-y
.xxl-pd-y
.xxxl-pd-y
```

### Contributing
Contributions to the QuickLand theme are welcome! If you have suggestions, improvements, or bug fixes, please feel free to open an issue or submit a pull request.

### License
This project is licensed under the MIT License.