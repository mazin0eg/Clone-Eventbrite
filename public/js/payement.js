
function openPaymentModal(ticketType, price) {
    const modal = document.getElementById('paymentModal');
    const ticketTypeElement = document.getElementById('ticketType');
    const ticketPriceElement = document.getElementById('ticketPrice');
    const cardDetails = document.getElementById('cardDetails');

    ticketTypeElement.textContent = ticketType;
    ticketPriceElement.textContent = `$${price.toFixed(2)}`;

    if (price === 0.00) {
        cardDetails.style.display = 'none';
    } else {
        cardDetails.style.display = 'block';
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';

    // Add animation classes
    const modalContent = modal.querySelector('div');
    modalContent.classList.add('animate-fade-in');
}

function closePaymentModal() {
    const modal = document.getElementById('paymentModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

function handlePayment(event) {
    event.preventDefault();

    const ticketPrice = parseFloat(document.getElementById('ticketPrice').textContent.replace('$', ''));

    // Show loading state
    const submitButton = event.target.querySelector('button[type="submit"]');
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.innerHTML = `
        <svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    `;

    // Simulate payment processing
    setTimeout(() => {
        submitButton.disabled = false;
        submitButton.textContent = originalText;

        if (ticketPrice === 0.00) {
            alert('Free Pass successfully claimed!');
        } else {
            alert('Payment successful! Enjoy the event.');
        }

        closePaymentModal();
    }, 2000); // Simulate a 2-second delay for payment processing
}


