<section>
    <style>
        .delete-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 2px solid #f8f9fa;
        }

        .delete-header {
            margin-bottom: 20px;
        }

        .delete-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ea4335;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .delete-warning {
            color: #5f6368;
            font-size: 0.95rem;
            line-height: 1.5;
            padding: 12px;
            background-color: #fff9f9;
            border-left: 4px solid #ea4335;
            border-radius: 4px;
        }

        .delete-button {
            background-color: #ea4335;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .delete-button:hover {
            background-color: #c23321;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(234, 67, 53, 0.2);
        }

        .delete-button:active {
            transform: translateY(0);
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .modal-container {
            background: white;
            border-radius: 12px;
            max-width: 500px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-content {
            padding: 30px;
        }

        .modal-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e8f0fe;
        }

        .modal-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ffeaea;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ea4335;
            font-size: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ea4335;
        }

        .modal-body {
            margin-bottom: 25px;
        }

        .modal-warning {
            background-color: #fff9f9;
            border: 1px solid #ffcdd2;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .modal-warning p {
            color: #b71c1c;
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
        }

        .modal-label {
            display: block;
            font-weight: 600;
            color: #202124;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .modal-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #dadce0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .modal-input:focus {
            outline: none;
            border-color: #ea4335;
            box-shadow: 0 0 0 3px rgba(234, 67, 53, 0.1);
        }

        .modal-input::placeholder {
            color: #9aa0a6;
        }

        .error-message {
            color: #ea4335;
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e8f0fe;
        }

        .cancel-button {
            background-color: #f8f9fa;
            color: #5f6368;
            border: 1px solid #dadce0;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cancel-button:hover {
            background-color: #e8f0fe;
            color: #1a73e8;
            border-color: #1a73e8;
        }

        .confirm-delete-button {
            background-color: #ea4335;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .confirm-delete-button:hover {
            background-color: #c23321;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(234, 67, 53, 0.2);
        }

        .confirm-delete-button:active {
            transform: translateY(0);
        }

        .danger-list {
            background-color: #fff9f9;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }

        .danger-list-title {
            font-weight: 600;
            color: #ea4335;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .danger-list ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .danger-list li {
            font-size: 0.9rem;
            color: #5f6368;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .danger-list li i {
            color: #ea4335;
            font-size: 0.9rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        @media (max-width: 768px) {
            .modal-content {
                padding: 20px;
            }
            
            .modal-actions {
                flex-direction: column-reverse;
            }
            
            .cancel-button,
            .confirm-delete-button {
                width: 100%;
                justify-content: center;
            }
            
            .modal-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
        }
    </style>

    <div class="delete-section">
        <header class="delete-header">
            <h2 class="delete-title">
                <i class="fas fa-exclamation-triangle"></i>
                {{ __('Delete Account') }}
            </h2>
            
            <div class="delete-warning">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </div>
        </header>

        <button 
            class="delete-button" 
            onclick="openDeleteModal()"
        >
            <i class="fas fa-trash-alt"></i>
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div id="delete-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h2 class="modal-title">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>
                </div>

                <div class="modal-body">
                    <div class="modal-warning">
                        <p>
                            <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>
                            {{ __('This action cannot be undone. All data will be permanently erased.') }}
                        </p>
                    </div>

                    <p style="color: #5f6368; font-size: 0.95rem; line-height: 1.5; margin-bottom: 20px;">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="danger-list">
                        <div class="danger-list-title">
                            <i class="fas fa-times-circle"></i>
                            What will be deleted:
                        </div>
                        <ul>
                            <li><i class="fas fa-user"></i> Personal profile information</li>
                            <li><i class="fas fa-calendar-check"></i> All appointments and medical records</li>
                            <li><i class="fas fa-pills"></i> Treatment history and prescriptions</li>
                            <li><i class="fas fa-file-medical"></i> Medical documents and test results</li>
                            <li><i class="fas fa-comments"></i> Messages and communications</li>
                        </ul>
                    </div>

                    <form method="post" action="{{ route('profile.destroy') }}" id="delete-form">
                        @csrf
                        @method('delete')

                        <div style="margin-top: 25px;">
                            <label for="password" class="modal-label">
                                <i class="fas fa-key" style="margin-right: 8px;"></i>
                                {{ __('Confirm Password') }}
                            </label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="modal-input"
                                placeholder="{{ __('Enter your password to confirm') }}"
                                required
                            />
                            @error('password', 'userDeletion')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="modal-actions">
                            <button type="button" class="cancel-button" onclick="closeDeleteModal()">
                                <i class="fas fa-times"></i>
                                {{ __('Cancel') }}
                            </button>
                            
                            <button type="submit" class="confirm-delete-button">
                                <i class="fas fa-trash-alt"></i>
                                {{ __('Delete Account Permanently') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            const modal = document.getElementById('delete-modal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeDeleteModal() {
            const modal = document.getElementById('delete-modal');
            modal.classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Close modal when clicking outside
        document.getElementById('delete-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('delete-modal');
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeDeleteModal();
            }
        });

        // Handle form submission with confirmation
        document.getElementById('delete-form').addEventListener('submit', function(e) {
            const passwordInput = document.getElementById('password');
            if (!passwordInput.value.trim()) {
                e.preventDefault();
                alert('Please enter your password to confirm account deletion.');
                passwordInput.focus();
                return;
            }
            
            if (!confirm('⚠️ FINAL WARNING: This will permanently delete your account and all associated data. This action cannot be undone.\n\nAre you absolutely sure?')) {
                e.preventDefault();
            }
        });

        // Open modal if there are errors
        @if($errors->userDeletion->isNotEmpty())
            document.addEventListener('DOMContentLoaded', function() {
                openDeleteModal();
            });
        @endif
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</section>