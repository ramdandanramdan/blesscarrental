@extends('admin.layouts.app')

@section('title', 'Live Chat')

@section('content')
<div class="admin-page-header header-blue anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-headset"></i></div>
            <div>
                <h4>Live Chat — Customer Service</h4>
                <p>Percakapan dengan pengunjung yang memilih chat dengan CS manusia</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-white text-primary rounded-pill d-flex align-items-center gap-1" style="position:relative;z-index:1;">
                <i class="fas fa-headset" style="font-size:10px;"></i> Human CS Only
            </span>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm overflow-hidden anim-fade-up anim-delay-2" style="border-radius:16px;">
    <div class="row g-0">
        <!-- Sessions Sidebar -->
        <div class="col-md-4 col-lg-3 border-end" style="max-height:650px;">
            <div class="chat-sessions h-100 d-flex flex-column">
                <div class="p-3 border-bottom bg-white" style="border-radius:16px 0 0 0;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control bg-light border-0" id="chatSearch" placeholder="Search conversations...">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <small class="text-muted fw-medium">CONVERSATIONS</small>
                        <small class="text-muted" id="totalSessions">0 chats</small>
                    </div>
                </div>
                <div class="session-list flex-grow-1 overflow-auto" id="sessionList">
                    @forelse($sessions as $index => $session)
                    <a href="#" class="session-item d-flex align-items-center p-3 border-bottom text-decoration-none
                              {{ $loop->first && !isset($session_id) ? 'active bg-light' : '' }}"
                       data-session-id="{{ $session['session_id'] }}"
                       onclick="loadSession('{{ $session['session_id'] }}'); return false;">
                        <div class="session-avatar me-3 position-relative">
                            <div class="avatar-circle bg-{{ ['primary', 'success', 'info', 'warning', 'danger'][$index % 5] }} text-white">
                                {{ strtoupper(substr($session['visitor_name'], 0, 1)) }}
                            </div>
                        </div>
                        <div class="session-info flex-grow-1 min-width-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-truncate fw-semibold">{{ $session['visitor_name'] }}</h6>
                                <small class="text-muted text-nowrap ms-2">
                                    {{ $session['last_message_at'] instanceof \Carbon\Carbon ? $session['last_message_at']->diffForHumans() : '' }}
                                </small>
                            </div>
                            <small class="text-muted d-block text-truncate">{{ $session['last_message'] ?: 'No messages yet' }}</small>
                        </div>
                        @if($session['unread_count'] > 0)
                            <span class="badge bg-danger rounded-pill ms-2 unread-badge">{{ $session['unread_count'] }}</span>
                        @endif
                    </a>
                    @empty
                    <div class="text-center text-muted py-5" id="emptySessions">
                        <i class="fas fa-comments fa-3x mb-3 d-block"></i>
                        <p class="mb-0">No active chat sessions</p>
                        <small>Percakapan akan muncul di sini</small>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="col-md-8 col-lg-9">
            <div class="chat-area d-flex flex-column" style="height:650px;">
                <!-- Chat Header -->
                <div class="chat-header p-3 border-bottom bg-white" id="chatHeader">
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle bg-primary text-white me-3">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-semibold" id="currentChatName">Pilih percakapan</h6>
                            <small class="text-muted" id="currentChatStatus">Pilih sesi di panel kiri</small>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div class="chat-messages flex-grow-1 p-3" id="chatMessages" style="overflow-y:auto; background-color:#f8f9fa;">
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-comment-dots fa-4x mb-3 d-block"></i>
                        <p class="mb-0">Pilih percakapan dari panel kiri</p>
                        <small>Pesan dari pengunjung akan muncul di sini</small>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="chat-input p-3 border-top bg-white">
                    <form id="chatSendForm" onsubmit="sendMessage(); return false;">
                        <div class="input-group">
                            <input type="text" class="form-control" id="messageInput"
                                   placeholder="Ketik pesan..." disabled
                                   style="border-radius:12px 0 0 12px; padding:12px 16px;">
                            <button type="submit" class="btn btn-primary" id="sendBtn" disabled
                                    style="border-radius:0 12px 12px 0; padding:12px 20px;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden audio for notification -->
<audio id="chatNotifSound" preload="auto">
    <source src="data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVggoKIeGBGPXuMmZlqZ2B1g5eZkXhwX3yLm510cGV7h5qfd3Ble4aYnXdwZXuGmJ13cGV7hpidd3Ble4aYnXdwZXuGmJ13cA==" type="audio/wav">
</audio>
@endsection

@push('styles')
<style>
    .chat-sessions { background: #fff; }
    .session-item { transition: all 0.2s ease; }
    .session-item:hover { background-color: #f0f4ff; }
    .session-item.active { background-color: #e8f0fe; border-left: 3px solid #0d6efd !important; }
    .session-avatar .avatar-circle {
        width: 42px; height: 42px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 600; font-size: 0.95rem; flex-shrink: 0;
    }
    .chat-area { background: #fff; }
    .chat-bubble {
        max-width: 75%; padding: 10px 14px; border-radius: 16px;
        margin-bottom: 8px; word-wrap: break-word; animation: bubbleIn 0.25s ease;
    }
    @keyframes bubbleIn {
        from { opacity: 0; transform: translateY(8px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .chat-bubble.visitor { background: #e9ecef; border-bottom-left-radius: 4px; align-self: flex-start; }
    .chat-bubble.admin { background: linear-gradient(135deg, #0d6efd, #0b5ed7); color: #fff; border-bottom-right-radius: 4px; align-self: flex-end; }
    .chat-bubble.ai { background: linear-gradient(135deg, #8b5cf6, #6366f1); color: #fff; border-bottom-right-radius: 4px; align-self: flex-end; }
    .chat-bubble .chat-time { font-size: 11px; opacity: 0.7; margin-top: 4px; display: block; }
    .chat-bubble.admin .chat-time, .chat-bubble.ai .chat-time { text-align: right; }
    #chatMessages { display: flex; flex-direction: column; }
    .unread-badge { animation: pulse 2s infinite; }
    @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.15); } }
    .form-check-input:checked { background-color: #f59e0b; border-color: #f59e0b; }
    .ai-label { background: linear-gradient(135deg, #8b5cf6, #6366f1); color: #fff; font-size: 9px; padding: 2px 6px; border-radius: 4px; font-weight: 600; }
</style>
@endpush

@section('scripts')
<script>
    let currentSessionId = {{ isset($session_id) ? "'".$session_id."'" : 'null' }};
    let refreshInterval = null;
    let sessionRefreshInterval = null;
    let lastMessageCount = 0;

    function loadSession(sessionId) {
        currentSessionId = sessionId;
        $('.session-item').removeClass('active bg-light');
        $(`.session-item[data-session-id="${sessionId}"]`).addClass('active bg-light');
        $('#messageInput').prop('disabled', false);
        $('#sendBtn').prop('disabled', false);

        const sessionName = $(`.session-item[data-session-id="${sessionId}"] .session-info h6`).text();
        $('#currentChatName').text(sessionName);
        $('#currentChatStatus').text('Menunggu balasan...');

        $.get('/admin/chat/sessions/' + sessionId + '/messages', function(messages) {
            const container = $('#chatMessages');
            container.empty();
            lastMessageCount = messages.length;

            if (messages.length === 0) {
                container.html('<div class="text-center text-muted py-5"><i class="fas fa-comment-dots fa-3x mb-3 d-block"></i><p class="mb-0">Mulai percakapan</p></div>');
                return;
            }

            messages.forEach(function(msg) {
                appendBubble(msg);
            });

            container.scrollTop(container[0].scrollHeight);
        });
    }

    function appendBubble(msg) {
        const container = $('#chatMessages');
        const isAdmin = msg.is_from_admin;
        const time = new Date(msg.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        const bubbleClass = isAdmin ? 'admin' : 'visitor';

        const bubble = `
            <div class="chat-bubble ${bubbleClass}">
                ${msg.message}
                <span class="chat-time">${time}</span>
            </div>
        `;
        container.append(bubble);
    }

    function sendMessage() {
        const message = $('#messageInput').val().trim();
        if (!message || !currentSessionId) return;

        $.ajax({
            url: '/admin/chat/sessions/' + currentSessionId + '/messages',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { message: message },
            success: function() {
                $('#messageInput').val('');
                loadSession(currentSessionId);
            }
        });
    }

    $('#messageInput').on('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    function startAutoRefresh() {
        if (refreshInterval) clearInterval(refreshInterval);
        refreshInterval = setInterval(function() {
            if (currentSessionId) {
                $.get('/admin/chat/sessions/' + currentSessionId + '/messages', function(messages) {
                    if (messages.length !== lastMessageCount) {
                        const container = $('#chatMessages');
                        const wasAtBottom = container[0].scrollTop + container[0].clientHeight >= container[0].scrollHeight - 50;

                        container.empty();
                        lastMessageCount = messages.length;
                        messages.forEach(function(msg) { appendBubble(msg); });

                        if (wasAtBottom) container.scrollTop(container[0].scrollHeight);

                        const lastMsg = messages[messages.length - 1];
                        if (lastMsg && !lastMsg.is_from_admin && lastMessageCount > 0) {
                            playNotifSound();
                        }
                    }
                });
            }
        }, 3000);
    }

    function startSessionRefresh() {
        if (sessionRefreshInterval) clearInterval(sessionRefreshInterval);
        sessionRefreshInterval = setInterval(function() {
            $.get('/admin/chat/sessions', function(sessions) {
                updateSessionSidebar(sessions);
            });
        }, 5000);
    }

    function updateSessionSidebar(sessions) {
        const container = $('#sessionList');
        $('#totalSessions').text(sessions.length + ' chats');

        if (sessions.length === 0) {
            container.html('<div class="text-center text-muted py-5" id="emptySessions"><i class="fas fa-headset fa-3x mb-3 d-block"></i><p class="mb-0">Belum ada chat dari CS</p><small>Percakapan CS akan muncul di sini</small></div>');
            return;
        }

        let html = '';
        sessions.forEach(function(session, index) {
            const colors = ['primary', 'success', 'info', 'warning', 'danger'];
            const color = colors[index % 5];
            const initial = (session.visitor_name || 'V').charAt(0).toUpperCase();
            const isActive = session.session_id === currentSessionId;
            const unreadBadge = session.unread_count > 0
                ? `<span class="badge bg-danger rounded-pill ms-2 unread-badge">${session.unread_count}</span>`
                : '';

            html += `
                <a href="#" class="session-item d-flex align-items-center p-3 border-bottom text-decoration-none ${isActive ? 'active bg-light' : ''}"
                   data-session-id="${session.session_id}"
                   onclick="loadSession('${session.session_id}'); return false;">
                    <div class="session-avatar me-3 position-relative">
                        <div class="avatar-circle bg-${color} text-white">${initial}</div>
                    </div>
                    <div class="session-info flex-grow-1 min-width-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-truncate fw-semibold">${session.visitor_name}</h6>
                            <small class="text-muted text-nowrap ms-2">${session.last_message_at || ''}</small>
                        </div>
                        <small class="text-muted d-block text-truncate">${session.last_message || 'No messages yet'}</small>
                    </div>
                    ${unreadBadge}
                </a>
            `;
        });
        container.html(html);
    }

    function playNotifSound() {
        try {
            const audio = document.getElementById('chatNotifSound');
            if (audio) { audio.currentTime = 0; audio.volume = 0.3; audio.play().catch(()=>{}); }
        } catch(e) {}
    }

    $('#chatSearch').on('input', function() {
        const query = $(this).val().toLowerCase();
        $('.session-item').each(function() {
            const name = $(this).find('h6').text().toLowerCase();
            $(this).toggle(name.includes(query));
        });
    });

    $(document).ready(function() {
        startAutoRefresh();
        startSessionRefresh();
        $.get('/admin/chat/sessions', function(sessions) { $('#totalSessions').text(sessions.length + ' chats'); });
    });
</script>
@endsection
