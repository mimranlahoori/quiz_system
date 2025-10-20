<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Achievement</title>
    <style>
        /* CSS Variables for Custom Colors */
        :root {
            --primary-blue: #1c5d99;
            /* Deep, professional blue */
            --accent-gold: #f7c548;
            /* Rich gold for highlights */
            --light-bg: #f3f4f6;
            /* Light gray background for printing context */
            --white: #ffffff;
            --gray-900: #111827;
        }

        /* Base Body and Layout Styling - Optimized for PDF generation */
        body {
            /* Using a generic font family for DomPDF compatibility */
            font-family: sans-serif;
            text-align: center;
            padding: 40px;
            margin: 0;
            background-color: var(--white);
            /* White background for clean print */
        }

        /* Certificate Container */
        .certificate-container {
            max-width: 1024px;
            width: 100%;
            margin: 0 auto;
            padding: 50px;
            background-color: var(--white);
            border-radius: 12px;
            /* Simple shadow is usually safe, complex ones are not */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Custom Border Styling - Simplified for DomPDF */
        .certificate-border {
            border: 5px solid var(--primary-blue);
            /* Solid border replaces border-image */
            padding: 20px;
        }

        /* Typography & Header */
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 5px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 18px;
            color: #4b5563;
            /* gray-700 */
            font-style: italic;
            font-weight: 300;
            margin-bottom: 30px;
        }

        /* Body Text */
        .certify-text {
            font-size: 20px;
            color: #1f2937;
            /* gray-800 */
            margin-top: 40px;
            margin-bottom: 10px;
        }

        /* Name Highlight - Simplification of rotation and shadow for PDF */
        .name-highlight {
            font-family: serif;
            font-size: 50px;
            font-weight: 900;
            color: var(--accent-gold);
            padding: 10px 25px;
            border-bottom: 2px solid var(--accent-gold);
            display: inline-block;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        /* Quiz Title */
        h3 {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-900);
            background-color: #f9fafb;
            /* Lighter bg-gray-50 */
            padding: 10px;
            display: inline-block;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        /* Score Highlight */
        .score-highlight {
            font-weight: bold;
            color: var(--primary-blue);
            font-size: 30px;
            margin-left: 5px;
        }

        /* Footer and Signature Area */
        .footer-area {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #d1d5db;
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            /* Align to the bottom for signature line */
        }

        .date-label,
        .signature-text {
            font-size: 16px;
            color: #4b5563;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .date-value {
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .signature-line {
            width: 200px;
            height: 1px;
            background-color: var(--gray-900);
            margin: 0 auto 5px;
            opacity: 0.8;
        }

        /* Note: Responsive media queries are often ignored or poorly rendered by DomPDF,
           so they are left out of this PDF-optimized version to prioritize stability. */
    </style>
</head>

<body>

    <!-- Certificate Container -->
    <div class="certificate-container certificate-border">

        <!-- Header -->
        <h1>Certificate of Achievement</h1>
        <p class="subtitle">Presented in recognition of outstanding performance</p>

        <!-- Body -->
        <p class="certify-text">This is to certify that</p>

        <!-- Name Highlight -->
        <h2 class="name-highlight">
            {{ $name ?? 'JANE DOE' }}
        </h2>

        <p class="certify-text">has successfully completed the program</p>

        <!-- Quiz Title -->
        <h3>
            "{{ $quiz_title ?? 'Data Science Fundamentals' }}"
        </h3>

        <!-- Score -->
        <p class="certify-text mt-6">
            with an exceptional score of
            <strong class="score-highlight">{{ $score ?? '92' }}%</strong>
        </p>

        <!-- Footer / Signature Area -->
        <div class="footer-area">
            <div class="text-left">
                <p class="date-label">Dated:</p>
                <p class="date-value">{{ $date ?? 'October 21, 2025' }}</p>
            </div>

            <div class="text-center">
                <!-- Placeholder for signature line -->
                <div class="signature-line"></div>
                <p class="signature-text">Authorized Signature</p>
            </div>
        </div>

    </div>
</body>

</html>