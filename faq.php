<div class="flex mt-5 flex-col items-center justify-center md:flex-row faq-form w-full">
    <div class="w-full my-2 lg:ml-20 lg:w-2/3 flex items-center justify-center flex-col second-place">
        <h3 class="text-center mb-4 text-light module-heading font-bold">FAQs</h3>

        <div class="accordion w-full">
            <div class="accordion-item mb-3 rounded-lg overflow-hidden">
                <div class="accordion-header bg-menublue cursor-pointer flex items-center justify-between p-3 hover:bg-blue-500 duration-200 ease-out w-full question-field rounded-t-lg">
                    How do I check my medical history?
                    <span class="accordion-icon inline-block duration-200 ease-out">
                        <svg class="h-6 w-6 text-gray-600 transition-transform transform origin-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 12l-6-6 1.414-1.414L10 9.172l4.586-4.586L16 6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="accordion-content bg-gray-100 overflow-hidden duration-200 ease-out w-full p-3 transition-all answer-field hidden">
                    You can check your medical history by accessing the "Medical History" section of our platform. This section contains comprehensive records of your past medical treatments, diagnoses, and procedures.
                </div>
            </div>

            <div class="accordion-item mb-3 rounded-lg overflow-hidden">
                <div class="accordion-header bg-menublue cursor-pointer flex items-center justify-between p-3 hover:bg-blue-500 duration-200 ease-out w-full question-field">
                    How can I check my symptoms?
                    <span class="accordion-icon inline-block duration-200 ease-out">
                        <svg class="h-6 w-6 text-gray-600 transition-transform transform origin-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 12l-6-6 1.414-1.414L10 9.172l4.586-4.586L16 6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="accordion-content bg-gray-100 overflow-hidden duration-200 ease-out w-full p-3 transition-all answer-field hidden">
                    You can check your symptoms by using our symptom checker tool. Simply input your symptoms, and the tool will provide you with potential diagnoses and recommendations.
                </div>
            </div>

            <div class="accordion-item mb-3 rounded-lg overflow-hidden">
                <div class="accordion-header bg-menublue cursor-pointer flex items-center justify-between p-3 hover:bg-blue-500 duration-200 ease-out w-full question-field">
                    How do I access my prescriptions?
                    <span class="accordion-icon inline-block duration-200 ease-out">
                        <svg class="h-6 w-6 text-gray-600 transition-transform transform origin-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 12l-6-6 1.414-1.414L10 9.172l4.586-4.586L16 6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="accordion-content bg-gray-100 overflow-hidden duration-200 ease-out w-full p-3 transition-all answer-field hidden">
                    You can access your prescriptions by navigating to the "Prescriptions" section of our platform. Here, you'll find details of your current and past prescriptions, including medication names, dosages, and refill information.
                </div>
            </div>

            <!-- Add more questions and answers as needed -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const accordionItems = document.querySelectorAll('.accordion-item');

        accordionItems.forEach(item => {
            const title = item.querySelector('.accordion-header');
            const content = item.querySelector('.accordion-content');

            title.addEventListener('click', () => {
                content.classList.toggle('hidden');
                title.querySelector('svg').classList.toggle('rotate-180');
            });
        });
    });
</script>
